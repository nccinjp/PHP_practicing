//2022.1.24
//SK1A 20 陳鏡宇
{
  const APIKey = "FP93jNInkB3RkUl94NzBYKMQoZLD3eORqDSZqd6s";
  const APIEndpoint = "https://opendata.resas-portal.go.jp";
  const prefAPIURL = "api/v1/prefectures";
  const citiesAPIURL = "api/v1/cities";

  const selectPref = document.querySelector( "#pref" );
  const cityArea = document.querySelector( "#city" );

  let selectPrefCode = null;
  //
  // 都道府県のセレクトメニューの項目生成
  //
  fetch(
    `${APIEndpoint}/${prefAPIURL}`,
    {
      headers: {
        'X-API-KEY': APIKey,
      }
    }
  )
  .then( ( response )=>{ return response.json() } )
  .then(
    ( data )=>{
      //console.log( data );
      const prefs = data.result;
      // forEachのcallback(value , key)
      prefs.forEach(
        ( pref )=>{
          // elementの生成
          const item = document.createElement("option");
          // 生成したelementのプロパティ設定（value属性と表示）
          item.value=pref.prefCode;
          item.innerText=pref.prefName;
          // selectに生成したelementを追加（最後尾）
          selectPref.append(item);
        }
      );
    }
  );

///// ここまでは、Ajaxのサンプルとして公開 /////
  async function addList(event){
    selectPrefCode = event.target.value;   
    const response = await fetch(
      `${APIEndpoint}/${citiesAPIURL}?prefCode=${selectPrefCode}`,
      {
        headers:{'X-API-KEY':APIKey}
      }
    );
    const json = await response.json();
    const cities = json.result;
    cityArea.innerText ="";

    cities.forEach(
      (city) => {
        const item = document.createElement("p");
        item.innerText=city.cityName;
        item.value=city.citycode;
        cityArea.append(item);
       })
    }
    
    selectPref.addEventListener("change",addList);
  }
    
