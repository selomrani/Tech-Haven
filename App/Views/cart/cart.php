<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body class="bg-[#050505] text-white font-sans p-10">
    <h1 class="text-3xl mb-6">Shopping Cart</h1>
    
    <?php if (empty($cartItems)): ?>
        <p>Cart is empty. <a href="/allproducts" class="text-blue-400">Go Back</a></p>
    <?php else: ?>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-700 text-gray-400">
                    <th class="p-4">Product</th>
                    <th class="p-4">Price</th>
                    <th class="p-4">Qty</th>
                    <th class="p-4">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cartItems as $item): ?>
                <tr class="border-b border-gray-800">
                    <td class="p-4"><?= $item['product']->getName() ?></td>
                    <td class="p-4">$<?= $item['product']->getPrice() ?></td>
                    <td class="p-4"><?= $item['quantity'] ?></td>
                    <td class="p-4 text-cyan-400">$<?= $item['line_total'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="mt-6 text-right">
            <h2 class="text-xl">Grand Total: <span class="text-cyan-400">$<?= $totalPrice ?></span></h2>
            <a href="/checkout" class="mt-4 inline-block bg-cyan-500 text-black px-6 py-2 font-bold">Checkout</a>
        </div>
    <?php endif; ?>
</body>
</html>