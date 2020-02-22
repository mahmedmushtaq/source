<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/16/2019
 * Time: 3:07 PM
 */?>

<!--         ===================================== FIRST GRID ITEM ============================ -->

        <div class="grid-items">
            <img class="title-image" src="handlers/assets/cook.jpg">
            <h2>Its About Food</h2>
            <p>Nowadays different variety of foods areavailable.But most of people around the world like rice and in meat they like chicken ,
                beaf and mutton..
            </p>

            <div class="read-more-div">
                <p><a href="#">read more</a></p>
            <p>2/7/19 2.30pm</p>
            </div>

        </div>

.grid-items{
width: 250px;
/*height: 440px;*/
background: white;
box-shadow: 1px 1px 1px 1px #ecf0f1;
display: flex;
flex-direction: column;

}

.grid-items h2{
margin:10px;
}

.title-image{
width: 250px;
height: 250px;
}
a{
text-decoration: none;
}

.read-more-div{
display: flex;
background: #2980b9;
justify-content: space-around;
color: white;
margin-top: auto;
padding: 10px;
justify-self: end;
}

.read-more-div a{
color: white;
}


/*GRID container */


.grid-container{
padding: 0 10px;
/*display: flex;*/


display: grid;
grid-template-columns: repeat(auto-fill,minmax(250px,1fr));
/*grid-gap: 35px 30px; first  for row and then*/
grid-gap: 20px 10px;
}

.grid-items p{
padding: 0 10px;
}