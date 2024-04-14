<template>
    <div class="fixed top-0 left-0 right-0 bg-green-500 text-white p-4 text-center">
        {{ succes }}
    </div>
</template>

<script>
export default {
    props: {
        succes: String
    }
};
</script>