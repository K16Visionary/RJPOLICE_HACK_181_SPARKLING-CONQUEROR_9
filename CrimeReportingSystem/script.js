const chatbotToggler = document.querySelector(".chatbot-toggler");
const closeBtn = document.querySelector(".close-btn");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");

let userMessage = null; 
const inputInitHeight = chatInput.scrollHeight;

const createChatLi = (message, className) => {

  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", `${className}`);
  let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
  chatLi.innerHTML = chatContent;
  chatLi.querySelector("p").textContent = message;
  return chatLi;
};

const predefinedOptions = {
  "hi": ["Hello! How can I assist you today? \nType 1 to learn about Cyber Crime.\nType 2 if you are a victim of cyber crime."],
  "1": ["Go to the link - https://cybercrime.gov.in/webform/crimecatdes.aspx to learn about cyber crime"],
  "2": ["Select the type of crime:\n" +
        "Financial Crime\n" +
        "i) Fraud.\n" +
        "ii) Money laundering.\n" +
        "iii) Insider trading.\n" +
        "iv) CyberCrime"],
  "i": ["Fraud\n\nDeception or dishonesty with the intent to gain something of value\nMisrepresentation of facts or false statements\nFinancial or economic harm to individuals or organizations\nExamples include identity theft, credit card fraud, and insurance fraud"],
  "ii": ["Money laundering\n\nConcealing the origins of illegally obtained money\nMaking illegally obtained money appear legitimate\nLayering or disguising the source of funds through complex transactions\nExamples include funneling illegal drug proceeds through legitimate businesses or offshore bank accounts"],
  "iii": ["Insider trading\n\nTrading of stocks or securities based on non-public information\nBreaching fiduciary duty or trust by corporate insiders\nGaining unfair advantage over other investors\nExamples include trading based on confidential company information or making trades before a major announcement"],
  "iv": ["CyberCrime\n\nCriminal activities conducted using computers or the internet\nUnauthorized access to computer systems or networks\nTheft or manipulation of data\nExamples include hacking, phishing, and malware attacks"],
  "bye": ["Goodbye! Have a great day!", "See you later!", "Take care!"],
};

const handleChat = () => {
    userMessage = chatInput.value.trim(); 
    if (!userMessage) return;
  
    chatbox.appendChild(createChatLi(userMessage, "outgoing")); 
  
    const options = predefinedOptions[userMessage.toLowerCase()]; 
    if (options) {
    
      options.forEach((option) => {
        chatbox.appendChild(createChatLi(option, "incoming"));
      });
    } else {
    
      const defaultMessage = "I'm sorry, I don't understand. Can you please rephrase your message?";
      chatbox.appendChild(createChatLi(defaultMessage, "incoming"));
    }
  
    chatbox.scrollTo(0, chatbox.scrollHeight);
    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;
  };

chatInput.addEventListener("input", () => {

  chatInput.style.height = `${inputInitHeight}px`;
  chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {

  if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    handleChat();
  }
});

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));s