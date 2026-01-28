// Chat Widget JavaScript

class ChatWidget {
  constructor() {
    this.conversationId = null;
    this.isOpen = false;
    this.messageRefreshInterval = null;
    this.lastMessageCount = 0;
    this.lastMessageIds = [];
    this.init();
  }

  init() {
    this.cacheElements();
    this.attachEventListeners();
    this.getOrCreateConversation();
  }

  cacheElements() {
    this.chatButton = document.querySelector('.chat-button');
    this.chatWidget = document.querySelector('.chat-widget');
    this.chatMessages = document.querySelector('.chat-messages');
    this.chatInput = document.querySelector('.chat-input');
    this.chatSendBtn = document.querySelector('.chat-send-btn');
    this.chatHeaderClose = document.querySelector('.chat-header-close');
    this.chatBadge = document.querySelector('.chat-badge');
  }

  attachEventListeners() {
    this.chatButton.addEventListener('click', () => this.toggleWidget());
    this.chatHeaderClose.addEventListener('click', () => this.closeWidget());
    this.chatSendBtn.addEventListener('click', () => this.sendMessage());
    this.chatInput.addEventListener('keypress', (e) => {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        this.sendMessage();
      }
    });

    // Auto-resize textarea
    this.chatInput.addEventListener('input', () => {
      this.chatInput.style.height = 'auto';
      this.chatInput.style.height = Math.min(this.chatInput.scrollHeight, 80) + 'px';
    });
  }

  toggleWidget() {
    if (this.isOpen) {
      this.closeWidget();
    } else {
      this.openWidget();
    }
  }

  openWidget() {
    this.isOpen = true;
    this.chatWidget.classList.add('active');
    this.chatButton.classList.add('active');
    this.chatInput.focus();
    this.loadMessages();
    
    // Refresh messages every 2 seconds
    if (this.messageRefreshInterval) {
      clearInterval(this.messageRefreshInterval);
    }
    this.messageRefreshInterval = setInterval(() => this.loadMessages(), 2000);
  }

  closeWidget() {
    this.isOpen = false;
    this.chatWidget.classList.remove('active');
    this.chatButton.classList.remove('active');
    
    if (this.messageRefreshInterval) {
      clearInterval(this.messageRefreshInterval);
    }
  }

  getOrCreateConversation() {
    fetch('chat_api.php?action=get_or_create_conversation')
      .then(response => response.json())
      .then(data => {
        if (data.conversation_id) {
          this.conversationId = data.conversation_id;
          this.loadMessages();
        }
      })
      .catch(error => console.error('Error:', error));
  }

  loadMessages() {
    if (!this.conversationId) return;

    fetch(`chat_api.php?action=get_messages&conversation_id=${this.conversationId}`)
      .then(response => response.json())
      .then(data => {
        if (data.messages) {
          this.displayMessages(data.messages);
        }
      })
      .catch(error => console.error('Error loading messages:', error));
  }

  displayMessages(messages) {
    // Extract message IDs to detect actual changes
    const currentMessageIds = messages.map(m => m.id).join(',');
    const messageIdsString = this.lastMessageIds.join(',');
    
    // Only update if messages have actually changed, not just on every refresh
    if (currentMessageIds === messageIdsString && this.chatMessages.children.length > 0 && !this.chatMessages.querySelector('.chat-empty')) {
      return;
    }
    
    this.lastMessageIds = messages.map(m => m.id);

    // Clear messages only when actually needed
    this.chatMessages.innerHTML = '';

    if (messages.length === 0) {
      this.chatMessages.innerHTML = `
        <div class="chat-empty">
          <div>
            <div class="chat-empty-icon">💬</div>
            <p>Start a conversation with our support team</p>
          </div>
        </div>
      `;
      return;
    }

    messages.forEach(msg => {
      const messageEl = document.createElement('div');
      const messageClass = msg.sender_type === 'user' ? 'user' : 'admin';
      const timestamp = new Date(msg.created_at).toLocaleTimeString([], { 
        hour: '2-digit', 
        minute: '2-digit' 
      });

      messageEl.className = `chat-message ${messageClass}`;
      messageEl.innerHTML = `
        <div>
          <div class="message-bubble">${this.escapeHtml(msg.message)}</div>
          <div class="message-time">${timestamp}</div>
        </div>
      `;

      this.chatMessages.appendChild(messageEl);
    });

    // Scroll to bottom
    this.chatMessages.scrollTop = this.chatMessages.scrollHeight;
  }

  sendMessage() {
    const message = this.chatInput.value.trim();

    if (!message || !this.conversationId) return;

    // Disable send button and show loading state
    this.chatSendBtn.disabled = true;
    this.chatInput.disabled = true;

    const formData = new FormData();
    formData.append('conversation_id', this.conversationId);
    formData.append('message', message);

    fetch('chat_api.php?action=send_message', {
      method: 'POST',
      body: formData
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          this.chatInput.value = '';
          this.chatInput.style.height = 'auto';
          this.loadMessages();
        } else {
          alert('Failed to send message');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Error sending message');
      })
      .finally(() => {
        this.chatSendBtn.disabled = false;
        this.chatInput.disabled = false;
        this.chatInput.focus();
      });
  }

  escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
  }
}

// Initialize chat widget when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  new ChatWidget();
});
