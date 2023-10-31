//2022.1.17 
//SK1A 20 陳鏡宇
{ 
    const teisu = "定数";
    let hensu = 10;


    console.log(`[teisuの中身]:${teisu}`);  //①定数定義
    console.log(hensu+=1);                  //②文字列連結

    const iterable = [10,20,30];            //配列の宣言

    for (const value of iterable) {    //④for of を使用した配列の全件走査
        if(value === 20){
        console.log(value);
        }
    }
    //⑤forEach メソッドを使用した配列の全件走査① コールバック関数に無名関数を設定した場合。
    iterable.forEach(function (value){
        console.log(value)
    });

    //⑥forEach メソッドを使用した配列の全件走査② 上記無名関数をアロー関数式を使用してラムダ風に。
    iterable.forEach(value =>{console.log(value)});

    const saveButton = document.querySelector("#btn_save");   //①ボタンオブジェクトの取得

    console.log(saveButton);
/*  跟下面的寫法呈現出線相同的結果但下方 ON CLICK 較常用
    //② ボタンにイベントリスナを付加
    saveButton.addEventListener("click",(event)=>{
        alert("登録ボタンが押されました。");
    });
  
    saveButton.onclick = (event) => {
        alert("登録ボタンが押されました。");
    }
*/
    const todoTextField = document.querySelector("#todo_text");
    
    /*
    saveButton.addEventListener ("click",(event) => {
        alert(todoTextField.value);
    });                                              */

    const todoListArea = document.querySelector("#todo_list");

    saveButton.addEventListener("click",(event)=>{
        const li = document.createElement("li");  //①<li>タグのElement を新規作成
        li.innerText = todoTextField.value;       //②<li>ここにテキストを挿入</li>
        todoListArea.append(li);                  //③<ul>Element 内に<li>Element を追加
    });

    /*
    todoListArea.onmousedown = (event) => {
        alert(todoTextField.value);
    };
    */


}