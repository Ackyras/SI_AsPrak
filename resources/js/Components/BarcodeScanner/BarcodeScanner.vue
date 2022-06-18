<template>
    <div class="relative">
        <div class="flex justify-between mb-4 items-center">
            <p class="text-xl md:text-2xl font-bold text-green-600 tracking-wide">Scan Barcode</p>
            <button type="button" class="text-gray-600 py-1 px-3 text-xl rounded border">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <p class="decode-result">Last result: <b>{{ result }}</b></p>
        <p class="error">{{ error }}</p>
        <qrcode-stream @decode="onDecode" @init="onInit" />
    </div>
</template>

<script>
import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue3-qrcode-reader'
export default {
    data () {
        return {
            result: '',
            error: ''
        }
    },
    methods: {
        onDecode (result) {
            this.result = result
        },

        async onInit (promise) {
            try {
                await promise
            } catch (error) {
                if (error.name === 'NotAllowedError') {
                    this.error = "ERROR: you need to grant camera access permission"
                } else if (error.name === 'NotFoundError') {
                    this.error = "ERROR: no camera on this device"
                } else if (error.name === 'NotSupportedError') {
                    this.error = "ERROR: secure context required (HTTPS, localhost)"
                } else if (error.name === 'NotReadableError') {
                    this.error = "ERROR: is the camera already in use?"
                } else if (error.name === 'OverconstrainedError') {
                    this.error = "ERROR: installed cameras are not suitable"
                } else if (error.name === 'StreamApiNotSupportedError') {
                    this.error = "ERROR: Stream API is not supported in this browser"
                } else if (error.name === 'InsecureContextError') {
                    this.error = 'ERROR: Camera access is only permitted in secure context. Use HTTPS or localhost rather than HTTP.';
                } else {
                    this.error = `ERROR: Camera error (${error.name})`;
                }
            }
        }
    },
    components: {
        QrcodeStream,
        QrcodeDropZone,
        QrcodeCapture
    },
};
</script>
