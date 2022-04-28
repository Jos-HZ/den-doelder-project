window.addEventListener('DOMContentLoaded', function() {
    textareaAutoGrow();
})
window.addEventListener('load', function() {
    //
})

function textareaOnInput(textarea) {
    textarea.parentNode.dataset.replicatedValue = textarea.value;
}

function textareaAutoGrow() {
    let dis = document.querySelectorAll('div.grow-wrap > textarea').forEach((element, index, array) => {
        element.parentNode.dataset.replicatedValue = element.value;
    });
}

// window.addEventListener('load', function() {
//     initQaz();
// })

// function initQaz() {
//     $(".io-toggler").each(function(){

//         console.log('init');

//         var io = $(this).data("io");
//         var $opts = $(this).find(".io-options");
//         var $clon = $opts.clone();
//         $(this).append($clon);
//         var $span = $clon.find("span");
//         $clon.css({width: `${100 / $span.length}%`});
//         var width = $opts.width() / $span.length;
//         // var width = $opts.width() / 2;

//         function swap(x) {
//             // log('swap');
//             // console.log(`swap: ${io}`);
//             $clon.stop().animate({left:  x}, 150);
//             $span.stop().animate({left: -x}, 150);
//             console.log(`x: ${x}`);
//             $(this).data("io", x === 0 ? 0 : 1);
//             // $(this).data("io", x === 0 ? 0 : 1);
//         }

//         function log(func) {
//             console.log(`\n ${func}`);
//             console.log({
//                 'io' : io,
//                 'opts': $opts,
//                 'clon': $clon,
//                 'span': $span,
//                 'width': width
//             })
//             // console.dir([io, $opts, $clon, $span, width])
//             // console.log({io, opts, clon, span, width})
//         }

//         $clon.draggable({
//             axis:"x",
//             containment:"parent",
//             drag:function(evt, ui){
//                 log('drag');
//                 // console.log(`drag: ${io}`);
//                 $span.css({left: -ui.position.left});
//                 $span.css({right: -ui.position.right});
//             },
//             stop:function(evt, ui){
//                 log('stop');
//                 // console.log(`stop: ${io}`);
//                 swap( ui.position.left < width/2 ? 0 : width * $span.length);
//             }
//         });

//         $opts.on("click", function(){
//             log('click');
//             // console.log(`click: ${io}`);
//             console.log(`clon pos left: ${$clon.position().left}`);
//             console.log(`clon pos right: ${$clon.position().right}`);
//             // console.log(`clon pos lr ratio: ${$clon.position().left / $clon.position().right}`);
//             // swap($clon.position().left > 0 ? 0 : width * ($span.length / 2));
//             // swap( $clon.position().left > 0 ? 0 : width);
//         });

//         // Read and set initial predefined data-io
//         if(!!io)$opts.trigger("click");
//         // on submit read $(".io-toggler").data("io") value

//     })
// }

// function onSelect(param, event) {
//     console.log(param);
//     document.querySelector('.containerQaz').addEventListener('mousemove', function() {
//         on(342343);
//     });
// }


// $(document).ready(function() {$(".io-toggler").each(function(){

//     // console.log('init');

//     var io = $(this).data("io");
//     var $opts = $(this).find(".io-options");
//     var $clon = $opts.clone();
//     $(this).append($clon);
//     var $span = $clon.find("span");
//     $clon.css({width: `${100 / $span.length}%`});
//     var width = $opts.width() / $span.length;
//     // var width = $opts.width() / 2;

//     console.log(io);

//     function swap(x) {
//         // log('swap');
//         // console.log(`swap: ${io}`);
//         $clon.stop().animate({left:  x}, 150);
//         $span.stop().animate({left: -x}, 150);
//         console.log(`x: ${x}`);
//         $(this).data("io", x === 0 ? 0 : 1);
//         // $(this).data("io", x === 0 ? 0 : 1);
//     }

//     function log(func) {
//         console.log(`\n ${func}`);
//         console.log({
//             'io' : io,
//             'opts': $opts,
//             'clon': $clon,
//             'span': $span,
//             'width': width
//         })
//         // console.dir([io, $opts, $clon, $span, width])
//         // console.log({io, opts, clon, span, width})
//     }

//     $clon.draggable({
//         axis:"x",
//         containment:"parent",
//         drag:function(evt, ui){
//             log('drag');
//             // console.log(`drag: ${io}`);
//             $span.css({left: -ui.position.left});
//             $span.css({right: -ui.position.right});
//         },
//         stop:function(evt, ui){
//             log('stop');
//             // console.log(`stop: ${io}`);
//             swap( ui.position.left < width/2 ? 0 : width * $span.length);
//         }
//     });

//     $opts.on("click", function(){
//         log('click');
//         // console.log(`click: ${io}`);
//         console.log(`clon pos left: ${$clon.position().left}`);
//         console.log(`clon pos right: ${$clon.position().right}`);
//         // console.log(`clon pos lr ratio: ${$clon.position().left / $clon.position().right}`);
//         // swap($clon.position().left > 0 ? 0 : width * ($span.length / 2));
//         // swap( $clon.position().left > 0 ? 0 : width);
//     });

//     // Read and set initial predefined data-io
//     if(!!io)$opts.trigger("click");
//     // on submit read $(".io-toggler").data("io") value

// })});

// windows.addEventListener('load', function() {
//     qaz();
// })

// function qaz() {
//     $(".io-toggler").each(function(){

//         var io = $(this).data("io"),
//             $opts = $(this).find(".io-options"),
//             $clon = $opts.clone(),
//             $span = $clon.find("span"),
//             width = $opts.width()/2;

//         $(this).append($clon);

//         function swap(x) {
//           $clon.stop().animate({left:  x}, 150);
//           $span.stop().animate({left: -x}, 150);
//           $(this).data("io", x===0 ? 0 : 1);
//         }

//         $clon.draggable({
//           axis:"x",
//           containment:"parent",
//           drag:function(evt, ui){
//             $span.css({left: -ui.position.left});
//           },
//           stop:function(evt, ui){
//             swap( ui.position.left < width/2 ? 0 : width );
//           }
//         });

//         $opts.on("click", function(){
//           swap( $clon.position().left>0 ? 0 : width );
//         });

//         // Read and set initial predefined data-io
//         if(!!io)$opts.trigger("click");
//         // on submit read $(".io-toggler").data("io") value

//       });
// }
