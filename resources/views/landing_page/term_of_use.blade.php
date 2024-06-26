@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container-fluid my-auto">
    <div class="row d-flex justify-content-center align-items-center mx-auto" style="height: 80vh;">
        <div class="col-12 col-sm-11 col-md-10 col-lg-6 card py-4 px-2 px-md-5 border-color-all" style="border-radius: 20px;  background-color:#caf0f8"> <!-- Adjust the column width as needed -->
            <h3 class="fw-bold" style="font-size:25px;">Terms of Use && The Privacy Policy</h3><br>
            <p class="fs-6">- စာရင်းသွင်းလိုက်ခြင်းဖြင့် ကျွန်ုပ်သည် Hello Health Group ၏ ကိုယ်ရေးအချက်အလက်စောင့်ထိန်းခြင်းမူဝါဒနှင့် ဝန်ဆောင်မှုစည်းကမ်းချက်များကို ဖတ်ရှု့နားလည်ပြီး လက်ခံသည်ဖြစ်ကြောင်း အတည်ပြုပါသည်။</p><br>
            <p class="fs-6">- Hello Health Group မှ ကိုယ်ရေးအချက်အလက်စောင့်ထိန်းခြင်းမူဝါဒနှင့်အညိ ကျွန်ုပ်၏ သတင်းအချက်အလက်များကို ကောက်ခံသိမ်းဆည်းအသုံးပြုဖွင့်ဟခြင်းနှင့် ပြုပြင်ခြင်းများကို သဘောတူပါသည်။</p><br>
            <p class="fs-6">- ထို့အပြင် Hello Health Groupမှ ကျွန်ုပ်စိတ်ဝင်စားမည်ဟု ယူဆရသော ကုန်ပစ္စည်းဝန်ဆောင်များ၊ အစီအစဉ်များ သို့မဟုတ် အခြားအကြောင်းအရာများကို ကျွန်ုပ်ထံ ပရိုမိုးရှင်းသတင်းအချက်အလက်အနေနှင့် စာ၊အီးမေးလ်၊တယ်လီဖုန်းနှင့် စာတိုပို့ခြင်းများအပါအဝင် ဆတ်သွယ်အကြောင်းကြားလာရန်အတွက် ကျွန်ုပ်၏ သတင်းအချက်အလက်များ အသုံးပြုခြင်းကို သဘောတူပါသည်။</p><br>
            <p class="fs-6">- ထိုမျှမက Hello Health Groupသည် ၎င်း၏တွဲဖက်လုပ်ကိုင်သူများနှင့် ပါတနာများအနေနှင့် ပိုမိုကောင်းမွန်သော ဝန်ဆောင်မှု
                များ၊ ပရိုမိုးရှင်းသတင်းအချက်အလက်များပေးနိုင်ရန်အတွက် ကျွန်ုပ်၏ သတင်းအချက်အလက်များမျှဝေခြင်းကိုသဘောတူပါသည်။</p>
            <a href="/back" class="col-md-4 mx-md-auto mt-2 btn btn-primary">Back</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection