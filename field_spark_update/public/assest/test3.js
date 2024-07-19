const questions = {
    all: [
        {
            question: "How to hybrid the capsicum plant?",
            views: 132000,
            comments: 98,
            likes: 15,
            replies: [
                { author: "User1", text: "You can cross-pollinate different varieties of capsicum." },
                { author: "User2", text: "Ensure the plants are mature enough for pollination." }
            ]
        },
        {
            question: "How can farmers adapt to the increasingly unpredictable weather patterns caused by climate change?",
            views: 102000,
            comments: 109,
            likes: 39,
            replies: [
                { author: "User3", text: "Farmers can use weather-resistant crops." },
                { author: "User4", text: "Implementing water management systems helps." }
            ]
        },
        {
            question: "How can we prevent soil degradation and maintain healthy, productive soil for sustainable agriculture?",
            views: 78000,
            comments: 45,
            likes: 25,
            replies: [
                { author: "User5", text: "Using organic fertilizers improves soil health." },
                { author: "User6", text: "Crop rotation is essential for soil fertility." }
            ]
        }
    ],
    solved: [
        {
            question: "What are the best practices for organic farming?",
            views: 50000,
            comments: 30,
            likes: 20,
            replies: [
                { author: "User7", text: "Use natural pest control methods." },
                { author: "User8", text: "Composting is key for organic farming." }
            ]
        },
        {
            question: "How to use drip irrigation systems effectively?",
            views: 62000,
            comments: 40,
            likes: 28,
            replies: [
                { author: "User9", text: "Ensure uniform water distribution." },
                { author: "User10", text: "Regularly check for clogs in the system." }
            ]
        }
    ],
    popular: [
        {
            question: "What are the high yield crops for small scale farmers?",
            views: 155000,
            comments: 78,
            likes: 50,
            replies: [
                { author: "User11", text: "Tomatoes and potatoes are high yield crops." },
                { author: "User12", text: "Leafy greens are also very productive." }
            ]
        },
        {
            question: "How to manage pests without chemicals?",
            views: 140000,
            comments: 85,
            likes: 45,
            replies: [
                { author: "User13", text: "Use natural predators like ladybugs." },
                { author: "User14", text: "Neem oil is effective against many pests." }
            ]
        }
    ]
};

function showTab(tab) {
    const questionsContainer = document.getElementById('questions-container');
    questionsContainer.innerHTML = ''; // Clear the container

    questions[tab].forEach((question, index) => {
        const questionElement = document.createElement('div');
        questionElement.className = 'question';
        questionElement.onclick = () => showQuestionDetail(tab, index);
        
        questionElement.innerHTML = `
            <div class="question-info">
                <img src="avatar.png" alt="Avatar">
                <div class="question-details">
                    <h2>${question.question}</h2>
                    <div class="meta">
                        <span>${question.views} views</span>
                        <span>${question.comments} comments</span>
                    </div>
                </div>
            </div>
            <div class="question-actions">
                <span>${question.likes}</span>
                <img src="heart.png" alt="Like">
            </div>
        `;
        questionsContainer.appendChild(questionElement);
    });
}

function addQuestion() {
    const newQuestionInput = document.getElementById('new-question');
    const newQuestionText = newQuestionInput.value.trim();

    if (newQuestionText !== '') {
        const newQuestion = {
            question: newQuestionText,
            views: 0,
            comments: 0,
            likes: 0,
            replies: []
        };
        
        questions.all.push(newQuestion);
        showTab('all'); // Refresh the All tab to show the new question
        newQuestionInput.value = ''; // Clear the input field
    }
}

function addReply() {
    const newReplyInput = document.getElementById('new-reply');
    const newReplyText = newReplyInput.value.trim();

    if (newReplyText !== '') {
        const questionDetailContent = document.getElementById('question-detail-content');
        const question = questions.all[currentQuestionIndex];

        const newReply = {
            author: "Instructor",
            text: newReplyText
        };

        question.replies.push(newReply);
        showQuestionDetail('all', currentQuestionIndex); // Refresh the question detail to show the new reply
        newReplyInput.value = ''; // Clear the input field
    }
}

let currentQuestionIndex;

function searchQuestions() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const questionsContainer = document.getElementById('questions-container');
    questionsContainer.innerHTML = ''; // Clear the container

    const searchResults = questions.all.filter(q => q.question.toLowerCase().includes(searchInput));

    searchResults.forEach((question, index) => {
        const questionElement = document.createElement('div');
        questionElement.className = 'question';
        questionElement.onclick = () => showQuestionDetail('all', index);
        
        questionElement.innerHTML = `
            <div class="question-info">
                <img src="avatar.png" alt="Avatar">
                <div class="question-details">
                    <h2>${question.question}</h2>
                    <div class="meta">
                        <span>${question.views} views</span>
                        <span>${question.comments} comments</span>
                    </div>
                </div>
            </div>
            <div class="question-actions">
                <span>${question.likes}</span>
                <img src="heart.png" alt="Like">
            </div>
        `;
        questionsContainer.appendChild(questionElement);
    });
}

function showQuestionDetail(tab, index) {
    currentQuestionIndex = index;
    const questionDetailContainer = document.getElementById('question-detail');
    const questionDetailContent = document.getElementById('question-detail-content');

    const question = questions[tab][index];

    questionDetailContent.innerHTML = `
        <h2>${question.question}</h2>
        <div class="meta">
            <span>${question.views} views</span>
            <span>${question.comments} comments</span>
            <span>${question.likes} likes</span>
        </div>
        <div class="replies">
            ${question.replies.map(reply => `
                <div class="reply">
                    <h3>${reply.author}</h3>
                    <p>${reply.text}</p>
                </div>
            `).join('')}
        </div>
    `;

    questionDetailContainer.classList.remove('hidden');
    questionDetailContainer.classList.add('visible');
}

function backToQuestions() {
    const questionDetailContainer = document.getElementById('question-detail');
    questionDetailContainer.classList.remove('visible');
    questionDetailContainer.classList.add('hidden');
}

// Initialize by showing the All tab
document.addEventListener('DOMContentLoaded', () => showTab('all'));
