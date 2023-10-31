//2022.1.24
//SK1A 20 陳鏡宇
//打開sample02.html按FN+F12 看DEVTOOLS裡的コンソール 
{ 
    console.log("1回目の表示");
    console.log("2回目の表示");
    /*
    setTimeout( () => {console.log("3回目の表示"); }, 3000), //ここが非同期処理3秒後に表示
    console.log("4回目の表示");
    */
   
    /*
    //PROMISE的用法 
    new Promise ((resolve)=>{
        setTimeout(()=>{
            console.log("3回目の表示"); 
            resolve();
            }, 
            3000);     // 非同期処理
    }).then(()=>{console.log("4回目の表示");}   );
    //}). 非同期処理が正常終了した後に実行されるコールバック関数
    */

    async function hyouji(){
        await new Promise((resolve)=>{
            setTimeout(()=>{
                console.log("3回目の表示");
                resolve();},1000)
            });
            console.log("4回の目表示");
    }
    hyouji();


    const category = document.querySelector("#category");

    //寫法一
    /*
    fetch("https://click.ecc.ac.jp/ecc/sakakura/ajax/selector-list.php")
    .then((Response)=>{return Response.json()})
    .then(json=>{
        const categories = json.categories; 
        categories.forEach(value =>{ 
            //console.log(json.categories;
            const item = document.createElement("option"); 
            item.value=value 
            item.innerText=value;
            category.append(item); 
        });
    });
    */

    //寫法2 async/await で書いてみる
    async function getCategory(){
        const response = await fetch("https://click.ecc.ac.jp/ecc/sakakura/ajax/selector-list.php"); 
        const json = await response.json(); 
        const categories = json.categories; 
        categories.forEach(value =>{ 
            const item = document.createElement("option"); 
            item.value=value 
            item.innerText=value;
            category.append(item); 
            });
    }
    getCategory();

}   