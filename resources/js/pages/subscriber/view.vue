<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import axios from 'axios';
import { useForm } from 'laravel-precognition-vue';
import Swal from 'sweetalert2';

const formRef = useForm('post', '/subscribe', {
    email: '',
    status: 'subscribed',
});

const submit = () => {
    axios.post('/subscribe', formRef.data()).then((response) => {
        if (response.data.status === 'ok') {
            Swal.fire({
                title: 'Success!',
                text: 'You have subscribed successfully!',
                icon: 'success',
                confirmButtonText: 'Cool',
            });

            formRef.email = '';
        }
    });
};
</script>

<template>
    <Form id="subscribe-form" method="post" @submit.prevent="submit">
        <label for="email">Email:</label><br />
        <input
            type="email"
            name="email"
            placeholder="test@example.com"
            id="email"
            required
            v-model="formRef.email"
            @change="formRef.validate('email')"
        />
        <div v-if="formRef.invalid('email')">
            {{ formRef.errors.email }}
        </div>
        <input type="hidden" v-model="formRef.status" name="status" id="status" />

        <br />
        <br />

        <button type="button" @click="submit">Subscribe</button>
    </Form>
</template>
