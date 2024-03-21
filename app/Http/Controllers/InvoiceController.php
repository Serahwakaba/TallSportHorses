<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use App\Models\Invoice as InvoiceModel;
use App\Models\User;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{

    /**
     * Download the invoice resource.
     */
    public function download(string $id)
    {
        $invoice_data = InvoiceModel::find($id);

        $client = new Party([
            'name'          => 'SportHorses BV',
            'custom_fields' => [
                'email'        => 'info@sporthorses.nl',
            ],
        ]);

        $customer = new Party([
            'name'          => $invoice_data->user->name,
            'address'       => $invoice_data->user->street_address,
            'phone' =>
            $invoice_data->user->phone_country_code . $invoice_data->user->phone,
            'custom_fields' => [
                'Email' => $invoice_data->user->email,
            ],
        ]);

        $item = InvoiceItem::make('Advertisement')->pricePerUnit($invoice_data->total);

        $invoice = Invoice::make()
            ->series(strtoupper($invoice_data->invoice_type))
            ->sequence($invoice_data->id)
            ->serialNumberFormat('{SERIES}/{SEQUENCE}')
            ->buyer($customer)
            ->seller($client)
            ->addItem($item)
            ->date($invoice_data->created_at)
            ->payUntilDays($invoice_data->pay_until_days)
            ->logo(public_path('images/sporthorses.png'));

        return $invoice->stream();
    }
}
