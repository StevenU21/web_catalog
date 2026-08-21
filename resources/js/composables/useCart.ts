import { computed, ref } from 'vue';
import type { Product } from '@/types';

export interface CartItem extends Product {
    quantity: number;
}

// Global state so it persists across components in the same Inertia visit
const cartItems = ref<CartItem[]>([]);

export function useCart() {
    const cartCount = computed(() => {
        return cartItems.value.reduce((total, item) => total + item.quantity, 0);
    });

    const parsePrice = (priceStr: string) => parseFloat(priceStr.replace(/[^\d.]/g, ''));

    const formatPrice = (amount: number) => `C$ ${amount.toFixed(2)}`;

    const cartTotalNumber = computed(() => {
        return cartItems.value.reduce((sum, item) => {
            return sum + (parsePrice(item.price) * item.quantity);
        }, 0);
    });

    const cartTotal = computed(() => {
        return formatPrice(cartTotalNumber.value);
    });

    const addToCart = (product: Product) => {
        const existingItem = cartItems.value.find(item => item.id === product.id);
        if (existingItem) {
            existingItem.quantity++;
        } else {
            cartItems.value.push({ ...product, quantity: 1 });
        }
    };

    const removeFromCart = (productId: number) => {
        const index = cartItems.value.findIndex(item => item.id === productId);
        if (index !== -1) {
            cartItems.value.splice(index, 1);
        }
    };

    const clearCart = () => {
        cartItems.value = [];
    };

    const generateWhatsAppLink = () => {
        if (cartItems.value.length === 0) return '#';

        const phoneNumber = '50588438783';
        let text = '*¡Hola Jolismar Store!* 👋\nQuiero realizar el siguiente pedido:\n\n';

        cartItems.value.forEach((item, index) => {
            text += `${index + 1}. ${item.name}\n`;
            text += `   Cantidad: ${item.quantity} x ${item.price}\n`;
        });

        text += `\n*Total estimado: ${cartTotal.value}*\n\n`;
        text += 'Por favor, confírmame disponibilidad y métodos de pago. ¡Gracias!';

        const encodedText = encodeURIComponent(text);
        return `https://wa.me/${phoneNumber}?text=${encodedText}`;
    };

    return {
        cartItems,
        cartCount,
        cartTotal,
        cartTotalNumber,
        parsePrice,
        formatPrice,
        addToCart,
        removeFromCart,
        clearCart,
        generateWhatsAppLink
    };
}
