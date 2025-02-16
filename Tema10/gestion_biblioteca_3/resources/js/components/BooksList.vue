<template>  
    <div>   
        <h1 class="bg-red-800 text-white">Lista de Libros</h1>
        <ul>
            <li v-for="book in books" :key="book.id">
                <span>{{ book.title }}</span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: [],
            };
        },
        mounted() {
            fetch('libros')
            .then((response) => response.json())
            .then((data) => {
                this.books = data;
            });
        }
    }
</script>