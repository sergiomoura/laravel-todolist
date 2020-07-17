console.log("Olá, Gilvan!!! Cadê vocÊ!!!");

// Declaração de variáveis!
let limiteDeIdade = 18;
console.log(limiteDeIdade);

// POLÊMICA!!!!!
let nomeDaMelhorAssis = "Camila";
console.log(nomeDaMelhorAssis);

nomeDaMelhorAssis = "Natália";
console.log(nomeDaMelhorAssis);

// DECLARAÇÃO DE CONSTANTES
const N_DIAS_DA_SEMANA = 7;
console.log(N_DIAS_DA_SEMANA);

// OBJETOS LITERAIS!!! Depois dos nossos comerciais!!
let tarefa = {
    descricao: "Pagar boleto da academia sem ir",
    feito: true
}
console.log(tarefa);

let cachorro = {
    nome: "Vintém",
    idade: 3,
    darPata: function(){
        return "Estou dando a pata!!!";
    },
    apresentar: function(){
        return "Meu nome é " + this.nome + ". Minha idade é " + this.idade + " anos";
    }
}
console.log(cachorro.nome);
console.log(cachorro.darPata());
// console.log(cachorro.apresentar());

let apresentacao = cachorro.apresentar();
console.log(apresentacao);

// Declaração de arrays
let tarefas = [
    {
        descricao: "Varrer a casa antes das crianças acordarem",
        feito: false,
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

    }
];

console.log(tarefas);

//*/ Para acessar a propriedade feito da segunda tarefa:
console.log(tarefas[1].feito);

// Quais instrumentos para realizar a segunda tarefa
console.log(tarefas[1].instrumentos);

// Quantos instrumentos preciso para realizar a segunda tarefa?
console.log(tarefas[1].instrumentos.length);
