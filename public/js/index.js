// ARRAY DE TAREFAS
let tarefas = [
    {
        descricao: "Varrer a casa antes das crianças acordarem",
        feito: true,
        instrumentos: [
            "Vassoura",
            "Pá"
        ]
    },
    {
        descricao: "Lavar os pratos antes de dormir",
        feito: false,
        instrumentos: [
            "coragem",
            "bucha",
            "detergente"
        ]
    },
    {
        descricao: "Desentupir vaso sanitário",
        feito: true,
        instrumentos: [
            "Magipac"
        ]
    }
];

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

mostrarTarefas(tarefas);

let button = document.querySelector('button');
button.onclick = function(evt){
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

