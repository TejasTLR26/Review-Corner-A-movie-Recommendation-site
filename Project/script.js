
 const stars = document.querySelectorAll(".stars i");
 stars.forEach((star, index1) => {
   star.addEventListener("click", () => {
     stars.forEach((star, index2) => {
       index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
     });
   });
 });

 const s = document.querySelectorAll('.stars i');
            let selectedStars = 0;

            s.forEach((star, index) => {
                star.addEventListener('click', () => {
                    selectedStars = index + 1;
                    document.getElementById("rating").setAttribute('value', selectedStars);
                });
            });