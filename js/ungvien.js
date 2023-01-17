const items = document.querySelectorAll('.item');
const btnSearch = document.querySelector('.btn-search')
const btnRenew = document.querySelector('.btn-renew')

var filterCity = document.querySelector('.filter__city')
var filterCityValue = filterCity.value
var filterCareer = document.querySelector('.filter__career')
var filterCareerValue = filterCareer.value

// tìm kiếm theo tên công việc được nhập vào từ người dùng
const inputSearch = document.querySelector('.search-name-post');
inputSearch.addEventListener('keyup', function() {
   var inputSearchValue = inputSearch.value.toUpperCase();
   for(const item of items){
      postName = item.querySelector('.item-mid-title').textContent;
      if(postName.toUpperCase().indexOf(inputSearchValue) > -1){
         item.style.display = ""
      }
      else item.style.display = "none"
   }
})


filterCity.addEventListener('change', (event) => {
   filterCityValue = event.target.value;
})

filterCareer.addEventListener('change', (event) => {
   filterCareerValue = event.target.value;
})

function filterHandle(){
   btnSearch.addEventListener('click', function() {
      if(filterCareerValue === "0" && filterCityValue === "0"){
         for(const item of items){
            item.style.display = "flex"
         }
      }
      else if(filterCareerValue !== "0" && filterCityValue !== "0"){
         // console.log("city a:" ,filterCityValue, "career b: ", filterCareerValue)
         for(const item of items){
            var dataCity = item.querySelector('.item-top-text-city').getAttribute("data")
            var dataCareer = item.querySelector('.item-top-text-career').getAttribute("data")
            if(dataCity === filterCityValue && dataCareer === filterCareerValue){
               item.style.display = "flex";
            }
            else{
               item.style.display = "none";
            }
         }
      }
      else{
         if(filterCareerValue === "0" && filterCityValue !== "0"){
            for(const item of items){
               var data = item.querySelector('.item-top-text-city').getAttribute("data")
               // console.log("city:" ,filterCityValue, "career: ", filterCareerValue)
               if(data !== filterCityValue)
                  item.style.display = "none";
               else item.style.display = "flex"
            }
         }
         else if(filterCityValue === "0" && filterCareerValue !== "0"){
            for(const item of items){
               var data = item.querySelector('.item-top-text-career').getAttribute("data")
               if(data !== filterCareerValue)
                  item.style.display = "none";
               else item.style.display = "flex"
            }
         }
      }
   })
}

btnRenew.addEventListener('click', function() {
   for(const item of items){
      item.style.display = "flex"
   }
   filterCity.options[filterCity.options.selectedIndex].selected = 0;
   filterCareer.options[filterCareer.options.selectedIndex].selected = 0;
})

filterHandle()