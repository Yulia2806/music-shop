<h1>Support</h1>

<div id="chat-box" class="border rounded p-3 mb-3" style="height: 400px; overflow-y: auto; background: #f8f9fa;">

    <?php foreach ($messages as $m): ?>

        <div class="d-flex mb-3 <?= $m['is_admin'] ? '' : 'justify-content-end' ?>">

            <div class="chat-bubble <?= $m['is_admin'] ? 'admin' : 'user' ?>">
                <div class="message-text">
                    <?= nl2br(htmlspecialchars($m['message'])) ?>
                </div>

                <div class="message-meta">
                    <?= $m['created_at'] ?> — <?= $m['is_admin'] ? 'Адмін' : 'Ви' ?>
                </div>
            </div>

        </div>

    <?php endforeach; ?>

</div>


<form id="sendForm" action="/?r=support-send" method="POST">
    <textarea name="message" class="form-control mb-2" placeholder="Ваше повідомлення..." required></textarea>
    <button class="btn btn-primary">Send</button>
</form>

<script>
// Auto refresh messages
function loadMessages() {
    fetch('/?r=support-ajax')
        .then(res => res.json())
        .then(data => {
            let html = '';

            data.forEach(m => {
                html += `
                    <div class="mb-2">
                        <strong>${m.is_admin == 1 ? 'Admin' : m.name}:</strong>
                        <div>${m.message.replace(/\n/g, "<br>")}</div>
                        <small class="text-muted">${m.created_at}</small>
                        <hr>
                    </div>`;
            });

            const box = document.getElementById('chat-box');
            const shouldScroll = box.scrollTop + box.clientHeight >= box.scrollHeight - 50;

            box.innerHTML = html;

            if (shouldScroll) {
                box.scrollTop = box.scrollHeight;
            }
        });
}

loadMessages();
setInterval(loadMessages, 3000);
</script>
