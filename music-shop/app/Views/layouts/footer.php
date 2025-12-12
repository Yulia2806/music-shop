</div> <!-- END .container -->

</div> <!-- END .container -->

<footer class="bg-light border-top mt-4 py-3">
    <div class="container text-center">
        © <?= date('Y') ?> Music Shop
    </div>

    <!-- Chat Toggle Button -->
    <button id="chat-toggle" class="btn btn-primary rounded-circle shadow"
        style="position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px;">
        💬
    </button>

    <!-- Chat Window -->
    <div id="chat-wrapper" class="shadow-lg" style="
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 350px;
        max-height: 500px;
        background: #fff;
        border-radius: 15px;
        display: none;
        flex-direction: column;
        overflow: hidden;
        z-index: 9999;
    ">
        <div class="bg-primary text-white p-3 d-flex justify-content-between align-items-center">
            <strong>Support</strong>
            <button id="chat-close" class="btn btn-light btn-sm">✕</button>
        </div>

        <div id="chat-box" style="padding: 15px; height: 350px; overflow-y: auto; background: #f8f9fa;">
        </div>

        <form id="chat-form" class="d-flex p-2 border-top">
            <input id="chat-input" type="text" name="message" class="form-control me-2" placeholder="Your message..." required>
            <button class="btn btn-primary">➤</button>
        </form>
    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- 🔥 Chat toggle logic -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const chatToggle = document.getElementById("chat-toggle");
    const chatWrapper = document.getElementById("chat-wrapper");
    const chatClose = document.getElementById("chat-close");

    chatToggle.addEventListener("click", function () {
        chatWrapper.style.display =
            (chatWrapper.style.display === "none" || chatWrapper.style.display === "") 
                ? "flex" 
                : "none";
    });

    chatClose.addEventListener("click", function () {
        chatWrapper.style.display = "none";
    });
});
</script>

</body>
</html>
