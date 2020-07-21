// Array de tarefas
let tarefas = [];

// Declaração da global para o token
let token = null;

// Funções = = = = = = = = = = = = = = = = =
function mostrarTarefa(tarefa){
    
    // Criar um li
    let li = document.createElement('li');

    // Criar um input do tipo checkbox
    let checkbox = document.createElement('input');
    checkbox.setAttribute("type","checkbox");

    // Marcar o checkbox se a tarefa tiver feito == true
    checkbox.checked = tarefa.feito;

    // Criar span
    let span = document.createElement('span');

    // Adicionar texto ao span
    span.innerText = tarefa.descricao;

    // Adicionar checkbox ao li
    li.appendChild(checkbox);

    // adicionar span ao li
    li.append(span);

    // adicionar o li à ul
    let lista = document.querySelector(".lista");
    lista.appendChild(li);

}

function mostrarTarefas(tarefas){

    // Limpando a lista antes
    let lista = document.querySelector("main ul.lista");
    lista.innerText = '';

    // Mostrando tarefas
    for(t of tarefas){
        mostrarTarefa(t);
    }
}

function adicionarTarefa(texto){

     // Criar uma tarefa com o conteúdo do campo
     let tarefa = {
        descricao: texto,
        feito: false,
        instrumentos: []
    }

    // Adicionar essa tarefa ao array de tarefas
    tarefas.push(tarefa)

    // Mostrar a tarefa criada
    mostrarTarefa(tarefa);

    // Limpando o campo
    document.getElementById("descricao").value = '';
}

function login(){
    // Caputurar conteúdo do campo email para var email
    let email = document.getElementById('email').value;

    // Caputurar conteúdo do campo password para var password
    let password = document.getElementById('password').value;

    let credenciais = {email:email, password:password}

    // Construir os cabeçalhos da req
    let headers = new Headers();
    headers.append('Content-type','application/json');

    // Enviar a req para o /api/auth/login usando o **fetch**
    let promise = fetch('/api/auth/login',{
        method:'post',
        headers: headers,
        body: JSON.stringify(credenciais)
    })

    promise.then(
        function(response) {
            if(!response.ok){
                alert("Falha no login");
                return;
            }

            return response.json();

        }
    ).then(
        function(conteudoResposta) {
            console.log(conteudoResposta);
            token = conteudoResposta.access_token;
            carregaTarefas();

            // Exibir bloco de tarefas
            document.getElementById('main').style.display = "block";

            // Esconde o form de login
            document.getElementById('form-login').style.display = "none"; 
        }
    )
}

function carregaTarefas(){

    // Criar cabeçalhos
    let headers = new Headers();
    headers.append('Authorization','Bearer ' + token);

    // Fazer a req get para /api/tarefas
    fetch('/api/tarefas',{
        method:'get',
        headers: headers
    }).then(
        function(response){
            return response.json();
        }
    ).then(
        function(tarefas){
            console.log(tarefas);
            mostrarTarefas(tarefas);
        }
    )

    // console.log nas tarefas que chegarem

}

// = = = = = = = = = = = = = = = = = = = = =
// ASSOCIAÇÃO DE EVENTOS ÀS FUNÇÕES...
let buttonAddTarefa = document.querySelector('#formulario button');
buttonAddTarefa.onclick = function(evt){
    let texto = document.getElementById('descricao').value;
    adicionarTarefa(texto);
}

// exibir caractere pressionado
let input = document.getElementById('descricao');
input.onkeypress = function(evt){
    
    evt.preventDefault();
    console.log(evt);

    // Capturar keyCode pressionado
    let keyCode = evt.keyCode;

    // Capturar o caractere digitado
    let char = evt.key;

    // Se keyCode for 13
    if(keyCode == 13){ // A tecla pressionada foi Enter?

        adicionarTarefa(evt.target.value);

    } else {

        // Adicionar ao final do valor do input o caractere pressionado
        evt.target.value = evt.target.value + char;

    }
}

let buttonLogin = document.querySelector("#form-login button");
buttonLogin.addEventListener('click', function(evt){
    evt.preventDefault();
    login();    
})



