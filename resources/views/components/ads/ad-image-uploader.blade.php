@props(['images'])
<div x-data="{
    images: @entangle($images),
    cloudinaryResponses: [],
    cloudName: 'geoffokumustudio',
    uploadPreset: 'evgr6nbq',
    loading: false,
    maxUploads: 20,

    selectFile(event) {
        if (event.target.files.length < 1) {
            return;
        }

        // Check if the total number of images plus the new ones exceeds the limit
        if (this.images.length + event.target.files.length > this.maxUploads) {
            alert(`You can only upload up to ${this.maxUploads} images.`);
            return;
        }

        for (var i = 0; i < event.target.files.length; i++) {
            let file = event.target.files[i];

            const reader = new FileReader();
            reader.readAsDataURL(file);

            reader.onload = async () => {
                this.loading = true;

                // Upload image to Cloudinary with specified transformations
                const cloudinaryResponse = await this.uploadToCloudinary(reader.result);

                // Update arrays with Cloudinary data
                this.images = [...this.images, cloudinaryResponse.secure_url];
                this.cloudinaryResponses = [...this.cloudinaryResponses, cloudinaryResponse];

                this.loading = false;
            };
        }
    },

    async uploadToCloudinary(base64Image) {

        const formData = new FormData();
        formData.append('file', base64Image);
        formData.append('upload_preset', this.uploadPreset);


        const transformation = {
            width: 1400,
            format: 'jpg'
        };

        // Convert the transformation object to a query string
        const transformationString = Object.keys(transformation)
            .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(transformation[key])}`)
            .join('&');

        // Append the transformation as a query parameter in the URL
        const apiUrl = `https://api.cloudinary.com/v1_1/${this.cloudName}/image/upload?${transformationString}`;



        const response = await fetch(`https://api.cloudinary.com/v1_1/${this.cloudName}/image/upload`, {
            method: 'POST',
            body: formData
        });

        const jsonResponse = await response.json();

        return jsonResponse;
    }
}" x-init="if (!images) {
    images = []
}" class="w-full grid gap-4 mt-2 mb-4">
    <template x-on="loading">
        <div
            class="fixed top-0 left-0 right-0 bottom-0 z-[100] flex items-center justify-center bg-black bg-opacity-50 text-white">
            {{ __('Uploading Images') }} ...
        </div>
    </template>

    <div :class="images.length > 0 && 'border-orange-500 dark:border-pink-500'"
        class="flex justify-center items-center border-2 border-gray-300 dark:border-dark-line border-dashed rounded-md h-48 overflow-y-hidden">

        <div class="space-y-1 text-center px-6 pt-5 pb-6 w-full">
            <x-icon-image-add class="mx-auto h-12 w-12 text-gray-400" />
            <div class="text-sm text-gray-600 dark:text-gray-400">
                <label
                    class="relative cursor-pointer bg-transparent rounded-md font-medium text-orange-500 dark:text-pink-500"
                    for="post_image">
                    <p class="text-gray-500 dark:text-white space-y-1 text-center">
                        <span
                            class="text-orange-500 dark:text-primary text-center block">{{ __('Upload Images') }}</span>
                        <span class="block text-xs text-gray-500">PNG, JPG up to *MB</span>
                    </p>
                    {{-- File input moved outside of template so to not be overwritten by the x-if --}}
                </label>
            </div>
        </div>




        <input class="sr-only" id="post_image" name="post_image" type="file" multiple x-on:change="selectFile">
    </div>

    <template x-if="images.length > 0">
        <div class="grid grid-cols-3 gap-4">
            <template x-for="(image,index) in images" :key="index">
                <div class="group relative h-[160px] w-full object-cover rounded">
                    <div class="hidden group-hover:flex absolute rounded justify-center items-center m-auto text-white tracking-wider uppercase bg-transparent h-full w-full hover:bg-black/75 hover:cursor-pointer"
                        x-on:click="images = images.filter((i,p) => p !== index)">
                        {{ __('Remove') }}
                    </div>
                    <img :src="image" alt="" class="w-full h-[160px] object-cover rounded">
                </div>
            </template>
        </div>
    </template>


</div>
