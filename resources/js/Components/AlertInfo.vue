<template>
    <div v-if="$page.props.notification" class="alert">
        {{ $page.props.notification.message }}
    </div>
</template>

<script>
</script>
