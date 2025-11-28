<!-- Modal Structure (Initially Hidden) -->
<div class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden" id="couponModal">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden">
        
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-[#01473d] to-[#003830] text-white px-6 py-4 relative">
            <p class="text-sm font-medium">Hurry! Limited time offer.</p>
            <button class="absolute top-4 right-4 text-white hover:text-gray-200 text-3xl leading-none" onclick="closeModal()">&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="px-6 py-6">
            
            <!-- Coupon Title -->
            <div class="text-xl font-bold text-gray-800 mb-4 text-center" id="couponTitle">
                🔥 Coupon Title
            </div>

            <!-- Coupon Code Box (for copycode) -->
            <div id="couponCodeSection" class="hidden">
                <div class="border-2 border-dashed border-[#0B453C] rounded-lg px-4 py-3 mb-4 cursor-pointer hover:bg-[#F2FCFA] transition flex items-center justify-between" onclick="copyCode()">
                    <span id="couponCode" class="text-[#003830] font-mono font-bold text-lg"></span>
                    <span class="text-gray-600">📋 Copy</span>
                </div>
                
                <p class="text-sm text-gray-600 text-center mb-4" id="couponCodeDescription">
                    Use this coupon at checkout to enjoy this offer on your purchase.
                </p>
            </div>

            <!-- No Code Required (for getdeal) -->
            <div id="dealSection" class="hidden">
                <div class="border-2 border-dashed border-[#0B453C] rounded-lg px-4 py-3 mb-4 flex items-center justify-between">
                    <span class="text-[#003830] font-mono font-bold text-lg">NO CODE REQUIRED</span>
                    <span>📋</span>
                </div>
                
                <button class="w-full bg-[#0B453C] hover:bg-[#003830] text-white font-semibold py-3 rounded-lg mb-4 transition" id="goto-btn" onclick="gotoDealFromModal()">
                    Get This Deal
                </button>
                
                <p class="text-sm text-gray-600 text-center mb-4" id="dealDescription">
                    GET THIS DEAL on click to enjoy this offer on your purchase.
                </p>
            </div>

            <!-- Terms & Conditions -->
            <div class="bg-gray-50 rounded-lg p-4 text-xs text-gray-700">
                <strong class="block mb-2 text-gray-900">Terms & Conditions:</strong>
                <div class="space-y-1" id="couponTerms">
                    Terms and conditions will appear here.
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="border-t border-gray-200 px-6 py-4 bg-gray-50 text-center">
            <img src="{{ env('APP_ASSETS')}}img/logo_yellow.webp" alt="Logo" class="h-8 mx-auto">
        </div>
    </div>
</div>

<!-- JavaScript for Modal -->
<script>
let currentCouponLink = '';

// Function to open coupon link and show modal
    function openCouponLink(link) {
        // Get coupon data from the button's attributes
        const button = event.target.closest('button');
        const code = button.getAttribute('data-code');
        const title = button.getAttribute('data-title') || 'Special Offer';
        const terms = button.getAttribute('data-terms') || 'Terms and conditions apply.';
        
        // Store data in sessionStorage so popup can access it
        sessionStorage.setItem('couponData', JSON.stringify({
            code: code || '',
            title: title,
            terms: terms,
            isCodeCoupon: code && code.trim() !== ''
        }));
        localStorage.setItem('showPopup', '1');
        // Open current page URL in new TAB (not popup window)
    const baseUrl = window.location.origin + window.location.pathname;
    window.open(baseUrl, '_blank');
        
        // Small delay then redirect current page to the link
        setTimeout(() => {
            window.location.href = link;
        }, 100);
    }

function openModal() {
    document.getElementById("couponModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("couponModal").style.display = "none";
}

// Close modal on outside click
window.onclick = function(event) {
    let modal = document.getElementById("couponModal");
    if (event.target === modal) {
        closeModal();
    }
};

function copyCode() {
    const codeEl = document.getElementById("couponCode");
    const codeText = codeEl.textContent;
    
    navigator.clipboard.writeText(codeText).then(() => {
        // Highlight the whole element visually
        codeEl.style.backgroundColor = "#ff9f19";
        codeEl.style.color = "black";
        codeEl.style.fontWeight = "bold";
        
        // Reset after 2 seconds
        setTimeout(() => {
            codeEl.style.backgroundColor = "";
            codeEl.style.color = "";
            codeEl.style.fontWeight = "";
        }, 2000);
    }).catch(err => {
        console.error("Failed to copy: ", err);
    });
}

function gotoDealFromModal() {
    if (currentCouponLink) {
        window.open(currentCouponLink, '_blank');
    }
}
</script>