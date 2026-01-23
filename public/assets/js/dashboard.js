 function handleAddProduct(event) {
            event.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const originalBtnContent = submitBtn.innerHTML;
            const form = event.target;
            const formData = new FormData(form);
            
            // Extract data for demo simulation
            const name = formData.get('name');
            const price = formData.get('price');
            const category = form.querySelector('select').options[form.querySelector('select').selectedIndex].text;

            // Loading State
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Processing...';
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');

            setTimeout(() => {
                // Success Logic
                submitBtn.innerHTML = originalBtnContent;
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');

                // Show Success Message
                const msg = document.getElementById('message-container');
                msg.classList.remove('hidden');
                msg.classList.add('animate-pulse');

                // Add to Recent List (Visual Simulation)
                const list = document.getElementById('recentProductsList');
                const newItem = `
                    <div class="flex gap-3 items-start group animate-fade-in-up">
                        <div class="w-12 h-12 bg-cyber-input border border-gray-800 rounded-sm flex items-center justify-center flex-shrink-0 group-hover:border-green-500 transition-colors">
                            <i class="fa-solid fa-check text-green-500"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-bold text-white truncate">${name}</h4>
                            <div class="flex items-center gap-2 mt-0.5">
                                <span class="text-xs text-cyber-cyan font-mono">$${price}</span>
                                <span class="text-[10px] text-gray-500">• ${category}</span>
                            </div>
                        </div>
                        <span class="text-[10px] bg-green-500/20 text-green-500 px-1.5 py-0.5 rounded">New</span>
                    </div>
                `;
                list.insertAdjacentHTML('afterbegin', newItem);

                // Reset Form
                form.reset();

                // Hide success message after 3s
                setTimeout(() => {
                    msg.classList.add('hidden');
                }, 3000);

            }, 1500);
        }