const items = document.querySelectorAll('.item1');
const btnSearch = document.querySelector('.btn-search')
const btnRenew = document.querySelector('.btn-renew')
var filterCity1 = document.querySelector('.filter_city')
var filterCityValue1 = filterCity1.value
var filterCareer1 = document.querySelector('.filter_career')
var filterCareerValue1 = filterCareer1.value

// tìm kiếm theo tên công việc được nhập vào từ người dùng
const inputSearch = document.querySelector('.search-name-post');
inputSearch.addEventListener('keyup', function() {
   var inputSearchValue = inputSearch.value.toUpperCase();
   for(const item1 of items){
      postName = item1.querySelector('.item-mid-title').textContent;
      if(postName.toUpperCase().indexOf(inputSearchValue) > -1){
         item1.style.display = ""
      }
      else item1.style.display = "none"
   }
})


filterCity1.addEventListener('change', (event) => {
   filterCityValue1 = event.target.value;
})

filterCareer1.addEventListener('change', (event) => {
   filterCareerValue1 = event.target.value;
})

function filterHandle(){
   btnSearch.addEventListener('click', function() {
      if(filterCareerValue1 === "0" && filterCityValue1 === "0"){
         for(const item1 of items){
            item1.style.display = "flex"
         }
      }
      else if(filterCareerValue1 !== "0" && filterCityValue1 !== "0"){
         // console.log("city a:" ,filterCityValue, "career b: ", filterCareerValue)
         for(const item1 of items){
            var dataCity1 = item1.querySelector('.item-top-text-city').getAttribute("data")
            var dataCareer1 = item1.querySelector('.item-top-text-career').getAttribute("data")
            if(dataCity1 === filterCityValue1 && dataCareer1 === filterCareerValue1){
               item1.style.display = "flex";
            }
            else{
               item1.style.display = "none";
            }
         }
      }
      else{
         if(filterCareerValue1 === "0" && filterCityValue1 !== "0"){
            for(const item1 of items){
               var data = item1.querySelector('.item-top-text-city').getAttribute("data")
               // console.log("city:" ,filterCityValue, "career: ", filterCareerValue)
               if(data !== filterCityValue1)
                  item1.style.display = "none";
               else item1.style.display = "flex"
            }
         }
         else if(filterCityValue1 === "0" && filterCareerValue1 !== "0"){
            for(const item1 of items){
               var data = item1.querySelector('.item-top-text-career').getAttribute("data")
               if(data !== filterCareerValue1)
                  item1.style.display = "none";
               else item1.style.display = "flex"
            }
         }
      }
   })
}

btnRenew.addEventListener('click', function() {
   for(const item1 of items){
      item1.style.display = "flex"
   }
   filterCity1.options[filterCity1.options.selectedIndex].selected = 0;
   filterCareer1.options[filterCareer1.options.selectedIndex].selected = 0;
})

filterHandle()