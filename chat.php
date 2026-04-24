<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json; charset=UTF-8");

/* ====== NHẬN MESSAGE ====== */
if(!isset($_POST["message"])){
    echo json_encode(["reply"=>"No message"]);
    exit;
}

$message = strtolower(trim($_POST["message"]));

/* ====== GOOGLE SHEET DATA ====== */
$url="https://docs.google.com/spreadsheets/d/e/2PACX-1vTJrSXcDOgiXG6q_UcA7SUQGvNlXtD3yswemugNom8wgT2zWZ6_6Ds5xMtDnnoyW5vrdNpmPunl7Ogk/pub?gid=1696404889&single=true&output=csv";
$data = array_map("str_getcsv", file($url));

/* ====== SEARCH KEYWORD ====== */
$bestAnswer = "";
$maxPercent = 0;

foreach($data as $row){

    if(count($row) < 2) continue;

    $keyword = strtolower(trim($row[0]));
    $answer  = trim($row[1]);

    similar_text($message, $keyword, $percent);

    if($percent > $maxPercent){
        $maxPercent = $percent;
        $bestAnswer = $answer;
    }
}

/* ====== LOGIC TRẢ LỜI ====== */
if($maxPercent > 70){

    // Match cao
    $reply = $bestAnswer;

} elseif($maxPercent > 40){

    // Match trung bình
    $aiReply = callGemini($message);
    $reply = $bestAnswer . "\n\n👉 Thông tin thêm:\n" . $aiReply;

} else {

    // Không match
    $reply = callGemini($message);
}

/* ====== DETECT Ý ĐỊNH XÂY DỰNG ====== */
if(isBuildIntent($message)){
    $reply .= "\n\n👉 Dạ, anh chị vui lòng để lại thông tin liên hệ (tên, số điện thoại, dự án quan tâm) để nhân viên tư vấn ngay.";
}

/* ====== SAVE CHAT ====== */
saveChat($message,$reply);

/* ====== RETURN ====== */
echo json_encode(["reply"=>$reply]);

/* ================================================= */
/* ================= FUNCTIONS ====================== */
/* ================================================= */

/* ====== NHẬN DIỆN Ý ĐỊNH ====== */
function isBuildIntent($message){

    $keywords = [
        "xây", "xây dựng", "thi công", "thiết kế",
        "làm", "cải tạo", "lắp", "trồng",
        "hồ koi", "hòn non bộ", "sân vườn",
        "báo giá", "chi phí", "giá bao nhiêu"
    ];

    foreach($keywords as $kw){
        if(strpos($message, $kw) !== false){
            return true;
        }
    }

    return false;
}

/* ====== CALL AI ====== */
function callGemini($message){

    global $data;

    $apiKey = "sk-bkN0CNKAizWx3NadIZg5wpy8vRJO862cYpzuNOO15ZUxXYwt"; // ⚠️ THAY KEY MỚI

    $url = "https://api.84gautomate.com/v1/chat/completions";

    /* 👉 Context từ Google Sheet */
    $context = "";
    foreach($data as $row){
        if(count($row) >= 2){
            $context .= "- ".$row[0].": ".$row[1]."\n";
        }
    }

    $postData = [
        "model" => "gemini-2.5-flash-lite",
        "messages" => [
            [
                "role" => "system",
                "content" => "Bạn là chatbot tư vấn cảnh quan xanh chuyên nghiệp.

Dữ liệu công ty:
".$context."

Nhiệm vụ:
- Hiểu đúng ý định khách hàng
- Tư vấn đúng nhu cầu (thiết kế, thi công, giá, bảo dưỡng...)
- Ưu tiên dùng dữ liệu công ty nếu có

Phong cách:
- Ngắn gọn
- Tự nhiên
- Thân thiện
- Có thể gợi ý thêm dịch vụ"
            ],
            [
                "role" => "user",
                "content" => $message
            ]
        ]
    ];

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer " . $apiKey
    ]);

    $response = curl_exec($ch);

    if(curl_errno($ch)){
        return "Lỗi CURL: " . curl_error($ch);
    }

    curl_close($ch);

    $result = json_decode($response, true);

    if(isset($result["error"])){
        return "Lỗi AI: " . $result["error"]["message"];
    }

    if(isset($result["choices"][0]["message"]["content"])){
        return trim($result["choices"][0]["message"]["content"]);
    }

    return "AI chưa trả lời.";
}

/* ====== SAVE CHAT ====== */
function saveChat($msg,$reply){

    $api="https://script.google.com/macros/s/AKfycbxxLiwD8vTnPQN7wFDtegk9nwuKUbaBw4gViCYS6EEgdjoCtoNsNu8cNloLXODq1Hegnw/exec";

    $data=json_encode([
        "user"=>"guest",
        "message"=>$msg,
        "reply"=>$reply
    ]);

    $ch=curl_init($api);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch,CURLOPT_HTTPHEADER,[
        "Content-Type: application/json"
    ]);

    curl_exec($ch);
    curl_close($ch);
}
?>