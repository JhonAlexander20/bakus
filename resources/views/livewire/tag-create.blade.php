<div>
    <x-dialog-modal wire:model="isOpen">
      <x-slot name="title">
        <h3>Registro nuevo tag</h3>
      </x-slot>
      <x-slot name="content">
        <form>
        <div class="flex justify-between mx-2 mb-6">
          <div class="mb-2 md:mr-2 md:mb-0 w-full">
            <x-label value="Nombre tag" class="font-bold"/>
            <x-input type="text" wire:model.defer="tag.name" class="w-full"/>
            <x-input-error for="tag.name"/>
          </div>
        </div>
        <div class="flex justify-between mx-2 mb-6">
          <div class="mb-2 md:mr-2 md:mb-0 w-full">
            <x-label value="Slug del tag" class="font-bold"/>
            <x-input type="text" wire:model.defer="tag.slug" class="w-full"/>
            <x-input-error for="tag.slug"/>
          </div>
        </div>
        </form>
      </x-slot>
      <x-slot name="footer">
        <x-secondary-button wire:click="$set('isOpen',false)" class="mx-2">Cancelar</x-secondary-button>
        <x-button wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store" class="disabled:opacity-25">
          Registrar
        </x-button>
      </x-slot>
    </x-dialog-modal>
</div>
