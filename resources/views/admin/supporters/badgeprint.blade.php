<!DOCTYPE html>
<html>

<head>
    <title>et-verfy-{{$supporter_id}}</title>
</head>

<body>
    <div style="text-align: left;">
        ET-VERIFY Document Check<br>
        Jimma University, +251 472 1157 61<br>
        Email: cvms@ju.edu.et<br>
        Jimma, ETHIOPIA<br><br>
        <b>Date/Time : {{ $created_at}} E.C</b>
    </div>
    <div style="text-align: center;">
        <img src="{{ public_path('ETHVerfinal.png') }}" style="width: 100px; height: 100px">
    </div>
    <div style="text-align: center;">
        <h3 style=" font-family:Arial, sans-serif; color:#030d1d"> {{ $title }}</h3>
       <small> To verify this supporter, go to <a
            href="https://et-verify.ju.edu.et/vsupporters">https://et-verify.ju.edu.et/vsupporters</a> and enter <b>supporter
            ID:{{$supporter_id}}</b></small>
    </div>
    <p>Record Number: {{$recordno}}</p>
    <u>
        <h3>Check Result</h3></u>
    <hr>
    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <td>
                The Status of Document Title: <b>{{$doctyperesult}}</b>
            </td>
            <td>
                The Status of Full Name : <b>{{$fullNameresult}}</b>

            </td>
        </tr>
        <tr>
            <td>
                The Status of GPA and About : <b>{{$gparesult}}</b>
            </td>
            <td>
                Have you seen any modifications in description? <b>{{$anymodificationexist}}</b>
            </td>
        </tr>
        <tr>
            <td>
            </td>
        </tr>
        <tr colspan="1">
          
            <td>
                
                How would you describe this document originality? <b>{{$othercomment}}</b>

            </td>
        </tr>
        <tr>
          
            <td>
                <br>
               <span style="font-family:cursive; font-size:0.7em"> Signature: {{$digsign}}</span>
            </td>
        </tr>
        </tbody>
    </table>
    <hr>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p><small> {{$footer}} </small></p>
    <footer>
        <p>ET-VERFY: ADMIN<br>
        <a href="mailto:cvms@ju.edu.et">cvms@ju.edu.et</a></p>
      </footer>
</body>

</html>
