<flux:card class="relative overflow-hidden !rounded-2xl w-full group h-[400px] xl:h-[550px] isolation-auto">
    <img
        src="{{ $product->homepage_attachment }}"
        alt="{{ $product->homepage_attachment }}"
        class="absolute inset-0 w-full h-full object-cover object-center image-hover"
        loading="lazy"
        decoding="async"
    />
    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>

    <div class="relative h-full z-10 flex flex-col justify-between">
        <div class="flex justify-between">
            <flux:badge color="zinc" variant="solid" class="opacity-80 h-10">
                {{ $product->short_label }}
            </flux:badge>

            <flux:badge :color="$product->stock > 0 ? 'lime' : 'rose'" variant="solid" class="opacity-80 h-10">
                {{ $product->stock > 0 ? __("pages/product.modal.in_stock") : __("pages/product.modal.out_of_stock") }}
            </flux:badge>
        </div>

        <div class="flex flex-col gap-5">
            <flux:heading size="xl" level="2" class="opacity-80 w-2/3">
                {{ $product->label }}
            </flux:heading>

            <flux:button
                icon="arrow-right"
                class="hover:cursor-pointer"
                @click="$dispatch('show-product', { uuid: '{{ $product->uuid }}' })"
            >
                {{ __("pages/product.open_product") }}
            </flux:button>
        </div>
    </div>

    <div class="sr-only">
        <h2>{{ $product->label }}</h2>
        <p>{!! $product->description !!}</p>
    </div>
</flux:card>
