<template>
    <div class="px-8 py-5">
        <ul class=" text-gray-500 space-y-4">
            <li class=" flex gap-4 items-center">
               <font-awesome-icon icon="list-ul" />
               <inertia-link href="/">All notes</inertia-link>

            </li>
            <li class=" flex gap-4 items-center">
               <font-awesome-icon icon="pen-to-square" />
               <inertia-link href="/create">Add note</inertia-link>

            </li>
            <li class=" flex gap-4 items-center">
               <font-awesome-icon icon="file-zipper" />
               <inertia-link  href="/archive">Archive</inertia-link>

            </li>
            <li class=" flex gap-4 items-center">
               <font-awesome-icon icon="trash-can" />
               <inertia-link href="/trash">Trash</inertia-link>

            </li>


        </ul>

    </div>
</template>