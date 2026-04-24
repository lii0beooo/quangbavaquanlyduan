function toggleChat() {
    const chatbox = document.getElementById("chatbox");
    const fb = document.getElementById("fb-toggle");
    const zalo = document.getElementById("zalo-toggle");

    if (chatbox.style.display === "flex") {
        chatbox.style.display = "none";
        fb.style.display = "flex";
        zalo.style.display = "flex";
    } else {
        chatbox.style.display = "flex";
        fb.style.display = "none";
        zalo.style.display = "none";
    }
}


async function sendMsg(){

let input=document.getElementById("msg")
let msg=input.value

if(msg=="") return

let box=document.getElementById("messages")

/* user message */

box.innerHTML+=`
<div class="msg user">
<div class="bubble">${msg}</div>
</div>
`

box.scrollTop=box.scrollHeight
input.value=""

/* typing animation */

box.innerHTML+=`
<div class="msg bot" id="typing">
<img src="images/chatbot.jpg">
<div class="bubble typing">
<div class="dot"></div>
<div class="dot"></div>
<div class="dot"></div>
</div>
</div>
`

box.scrollTop=box.scrollHeight

/* gửi server */

let res=await fetch("chatbot/chat.php",{
method:"POST",
headers:{
"Content-Type":"application/x-www-form-urlencoded"
},
body:"message="+encodeURIComponent(msg)
})

let data=await res.json()

/* xóa typing */

document.getElementById("typing").remove()

/* bot message */

box.innerHTML+=`
<div class="msg bot">
<img src="images/chatbot.jpg">
<div class="bubble">${data.reply}</div>
</div>
`

box.scrollTop=box.scrollHeight

let botReply = data.reply;

fetch("https://script.google.com/macros/s/AKfycbxxLiwD8vTnPQN7wFDtegk9nwuKUbaBw4gViCYS6EEgdjoCtoNsNu8cNloLXODq1Hegnw/exec",{
method:"POST",
body:JSON.stringify({
user:"guest",
message:msg,
reply:botReply
})
});

}