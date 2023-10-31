{
  const doc = document;
  const nav = doc.querySelector( 'nav' );
  const navTop = nav.offsetTop;
  window.addEventListener(
    'scroll',
    ()=>{
      let scrollTop = doc.documentElement.scrollTop;
      let dist = scrollTop - navTop;
      nav.style.transform = (scrollTop >= navTop) ? `translateY(${dist}px)` : `translateY(0)`;
    }
  )
}