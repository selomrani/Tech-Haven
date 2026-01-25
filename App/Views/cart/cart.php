<?php
use App\Controllers\CartController;
require_once __DIR__ . '/../../vendor/autoload.php';

// Fetch items
$cartItems = CartController::getCartItems();
$grandTotal = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Cart - Tech Haven</title>
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body class="bg-[#050505] text-gray-200 font-sans">

    <div class="max-w-4xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-white mb-8">Shopping <span class="text-[#00f3ff]">Cart</span></h1>

        <?php if (empty($cartItems)): ?>
            <p class="text-gray-500">Your cart is empty.</p>
            <a href="/allProducts.php" class="text-[#00f3ff] hover:underline mt-4 block">Continue Shopping</a>
        <?php else: ?>
            
            <div class="bg-[#0a0b10] border border-white/5 p-6 rounded-sm">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs text-gray-500 uppercase border-b border-white/10">
                            <th class="pb-4">Product</th>
                            <th class="pb-4">Price</th>
                            <th class="pb-4">Quantity</th>
                            <th class="pb-4">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <?php foreach ($cartItems as $item): 
                            $product = $item['product'];
                            $grandTotal += $item['total'];
                        ?>
                        <tr>
                            <td class="py-4 flex items-center gap-4">
                                <img src="<?= $product->getImage() ?>" class="w-12 h-12 object-cover rounded-sm border border-white/10">
                                <div>
                                    <h4 class="text-white font-bold text-sm"><?= $product->getName() ?></h4>
                                    <span class="text-xs text-gray-500"><?= $product->getCategory() ?></span>
                                </div>
                            </td>
                            <td class="py-4 text-sm">$<?= $product->getPrice() ?></td>
                            <td class="py-4 text-sm">
                                <span class="bg-[#12141c] px-3 py-1 border border-white/10 rounded-sm">
                                    <?= $item['quantity'] ?>
                                </span>
                            </td>
                            <td class="py-4 text-[#00f3ff] font-bold text-sm">$<?= number_format($item['total'], 2) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="mt-8 border-t border-white/10 pt-6 flex justify-between items-center">
                    <a href="/allProducts.php" class="text-gray-500 text-sm hover:text-white">← Continue Shopping</a>
                    <div class="text-right">
                        <div class="text-gray-400 text-sm mb-1">Subtotal</div>
                        <div class="text-3xl font-bold text-white">$<?= number_format($grandTotal, 2) ?></div>
                        <button class="mt-4 bg-[#00f3ff] text-black font-bold px-6 py-2 uppercase text-sm hover:bg-white transition-colors">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>

</body>
</html>