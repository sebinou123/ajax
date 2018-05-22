<head>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript">
            
            var controller = 'Pages';
            var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';

            function load_data_ajax(type){
                $.ajax({
                    'url' : base_url + '/' + controller + '/video',
                    'type' : 'POST', //the way you want to send data to your URL
                    'data' : {'type' : type},
                    'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                        var container = $('#container'); //jquery selector (get element by id)
                        if(data){
                            container.html(data);
                        }
                    }
                });
            }
        </script>

    </head>

        <button onclick="load_data_ajax(1)">En quelle année est sortie la première console de sony?</button>
        <button onclick="load_data_ajax(2)">En quelle année est sortie la première console de microsoft?</button>
         <button onclick="load_data_ajax(3)">En quelle année est sortie le premier jeux de la série borderlands?</button>

        <hr />
        
        <div id="container"></div>
