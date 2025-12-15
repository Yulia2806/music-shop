<div class="container mt-4">
    <h2>Support Chat</h2>

    <div id="chat-box" class="border rounded p-3 mb-3"
         style="height:300px; overflow-y:auto; background:#f8f9fa;">
    </div>

    <form id="chat-form" class="d-flex gap-2">
        <input type="text" id="chat-input" class="form-control"
               placeholder="Type your message..." required>
        <button class="btn btn-primary">Send</button>
    </form>
</div>

<script>
loadMessages();

setInterval(loadMessages, 3000); // автооновлення

function loadMessages() {
    fetch('/?r=support-ajax')
        .then(res => res.json())
        .then(resp => {
            const box = document.getElementById('chat-box');
            box.innerHTML = '';

            resp.data.forEach(m => {
                const div = document.createElement('div');
                div.className = m.is_admin == 1
                    ? 'text-end text-primary mb-2'
                    : 'text-start mb-2';

                div.innerHTML = `
                    <span class="badge ${m.is_admin == 1 ? 'bg-primary' : 'bg-secondary'}">
                        ${m.is_admin == 1 ? 'Admin' : 'User'}
                    </span>
                    <div>${escapeHtml(m.message)}</div>
                `;

                box.appendChild(div);
            });

            box.scrollTop = box.scrollHeight;
        });
}

document.getElementById('chat-form').addEventListener('submit', e => {
    e.preventDefault();

    fetch('/?r=support-send-ajax', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'message=' + encodeURIComponent(
            document.getElementById('chat-input').value
        )
    })
    .then(res => res.json())
    .then(() => {
        document.getElementById('chat-input').value = '';
        loadMessages();
    });
});

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
</script>
