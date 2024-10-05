<div class="flex p-20- items-center flex-col">

    <h1 class="text-3xl">{{$number}}</h1>

<div>
    <button wire:click="decrement" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 "
    >Decrement</button>
    <button wire:click="increment" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 "
    >Increment</button>
</div>
</div>
