<!-- Modal Structure (Initially Hidden) -->
<div class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden" id="tremModal">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden">
        
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-[#01473d] to-[#003830] text-white px-6 py-6 relative">
            <p class="text-sm font-medium"></p>
            <button class="absolute top-5 right-4 text-white hover:text-gray-200 text-3xl leading-none" onclick="closeModasl()">&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="px-6 py-6">
            <!-- Terms & Conditions -->
            <div class="bg-gray-50 rounded-lg p-4 text-xs text-gray-700">
                
                <div class="space-y-1 " id="couponTermsa">
                    Terms and conditions will appear here.
                </div>
            </div>
        </div>

    </div>
</div>

<!-- JavaScript for Modal -->
<script>
    function openTerms(el) {
    const terms = el.getAttribute("data-termsa");
    document.getElementById("couponTermsa").innerHTML = terms;
    document.getElementById("tremModal").style.display = "flex";
}
 

function closeModasl() {
    document.getElementById("tremModal").style.display = "none";
}

</script>