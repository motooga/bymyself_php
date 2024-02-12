import { usePage } from '@inertiajs/vue3';

export const user = usePage().props.auth.user;
