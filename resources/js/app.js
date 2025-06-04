import './bootstrap';

// Only import Alpine if it's not already loaded by Livewire
if (typeof window.Alpine === 'undefined') {
    import('alpinejs').then((Alpine) => {
        window.Alpine = Alpine.default;
        Alpine.default.start();
    });
}