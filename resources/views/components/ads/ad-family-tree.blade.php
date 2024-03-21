@props(['familyTree'])

<div x-data="{
    family_tree: @entangle($familyTree)
}" x-init="if (!family_tree) {
    family_tree = {}
}" class="w-full">
    <div class="grid md:grid-cols-2 md:w-[60%] mb-10 md:mb-0 mx-auto border border-black rounded-xl">
        <div class="p-4">
            <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.sire"
                placeholder="{{ __('Sire') }}" />
            <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_sire"
                placeholder="{{ __('Predicate Sire') }}" />
        </div>
        <div class="p-4 bg-gray-100 md:bg-transparent rounded-b-xl">
            <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.mother"
                placeholder="{{ __('Mother') }}" />
            <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_mother"
                placeholder="{{ __('Predicate Mother') }}" />
        </div>
    </div>
    <div class="hidden md:flex justify-center">
        <img src="/images/chart-arrows.svg" class="w-[50%]" alt="arrows">
    </div>
    <section class="w-full grid mb-10 md:mb-0 md:grid-cols-2 gap-4 md:gap-8">
        <div class="grid md:mx-auto border border-black rounded-xl">
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.sire_sire"
                    placeholder="{{ __('Sire of Sire') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_sire_sire"
                    placeholder="{{ __('Predicate Sire of Sire') }}" />
            </div>
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.mother_sire"
                    placeholder="{{ __('Mother of Sire') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_mother_sire"
                    placeholder="{{ __('Predicate Mother of Sire') }}" />
            </div>
        </div>
        <div class="grid md:mx-auto border border-black rounded-xl bg-gray-100">
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.sire_mother"
                    placeholder="{{ __('Sire of Mother') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_sire_mother"
                    placeholder="{{ __('Predicate Sire of Mother') }}" />
            </div>
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.mother_mother"
                    placeholder="{{ __('Mother of Mother') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_mother_mother"
                    placeholder="{{ __('Predicate Mother of Mother') }}" />
            </div>
        </div>
    </section>

    <div class="hidden md:flex justify-around">
        <img src="/images/chart-arrows.svg" class="w-[30%]" alt="arrows">
        <img src="/images/chart-arrows.svg" class="w-[30%]" alt="arrows">
    </div>

    <section class="w-full grid md:grid-cols-4 gap-4 md:gap-8">
        <div class="grid w-full border border-black rounded-xl">
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.sss"
                    placeholder="{{ __('S.S.S') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_sss"
                    placeholder="{{ __('Predicate S.S.S') }}" />
            </div>
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.mss"
                    placeholder="{{ __('M.S.S') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_mss"
                    placeholder="{{ __('Predicate M.S.S') }}" />
            </div>
        </div>
        <div class="grid w-full border border-black rounded-xl">
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.sds"
                    placeholder="{{ __('S.M.S') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_sds"
                    placeholder="{{ __('Predicate S.M.S') }}" />
            </div>
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.mms"
                    placeholder="{{ __('M.M.S') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_mms"
                    placeholder="{{ __('Predicate M.M.S') }}" />
            </div>
        </div>
        <div class="grid w-full border border-black rounded-xl bg-gray-100 md:bg-transparent">
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.ssm"
                    placeholder="{{ __('S.S.M') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_ssm"
                    placeholder="{{ __('Predicate S.S.M') }}" />
            </div>
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.msm"
                    placeholder="{{ __('M.S.M') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_msm"
                    placeholder="{{ __('Predicate M.S.M') }}" />
            </div>
        </div>
        <div class="grid w-full border border-black rounded-xl bg-gray-100 md:bg-transparent">
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.smm"
                    placeholder="{{ __('S.M.M') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_smm"
                    placeholder="{{ __('Predicate S.M.M') }}" />
            </div>
            <div class="p-4">
                <x-input type="text" class="w-full mb-1 block text-sm" x-model="family_tree.mmm"
                    placeholder="{{ __('M.M.M') }}" />
                <x-input type="text" class="w-full block text-sm" x-model="family_tree.predicate_mmm"
                    placeholder="{{ __('Predicate M.M.M') }}" />
            </div>
        </div>
    </section>
</div>
