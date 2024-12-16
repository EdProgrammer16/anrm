var urlQuery = document.location.search;
var value = urlQuery.replace('?service=', '');

let pAgropecuariaAvicultura = {
    p1: "<p class='text-justify'><strong><u>AGROPECUÁRIA</u></strong> consiste no conjunto de actividades primárias, direitamente associada ao cultivo de plantas (agricultura) e à criação de animais (pecuária) para o consumo humano ou para o fornecimento de matérias-primas.</p>",
    p2: "<p class='text-justify'><strong><u>AVICULTURA</u></strong> está relacionada com às técnicas, procedimentos e conhecimentos que permitem o desenvolvimento da criação de aves (galinhas, patos, perus, pombos ou outras espécies), adequando o seu habitat.</p>",
    p3: "<p class='text-justify'>Estamos prontos para oferecer serviços de alta qualidade e ajudar a impulsionar as tuas capacidades de produção e gestão no que concerne a <span class='text-danger'>AGRICULTURA E SILVICULTURA, PECUÁRIA E AVICULTURA, PESCA, AQUICULTURA E PSICULTURA</span>.</p>"
}
let pArquitetura = {
    p1: "<p class='text-justify'><strong><u>Arquitetura</u></strong> é a arte e técnica de projetar uma edificação ou um ambiente de uma construção. É o processo artístico e técnico que envolve a elaboração de espaços organizados e criativos para abrigar diferentes tipos de atividades humanas.</p>",
    p2: "<p class='text-justify'>Elaboramos Projectos Arquitectônicos de baixa, média e alta renda, desde o térreo à elevação. Fornecemos todas peças desenhadas e acompanhadas com as redes técnicas (Electrecidade, Canalização, Parabólica e ar condicionado, etc), modelos 3D (perspectivas) e as respectivas memórias descritivas e justificativas com as assinaturas reconhecidas pelo Governos da Provinciais.</p>"
}
let pContrucaoCivil = {
    p1: "<p class='text-justify'>A TOPOFLY oferece serviços de <b><u>Engenharia Civil</u></b> para projectos de infra- estrutura, comerciais, de hospitalidade, escritórios e residenciais desde a fase inicial, fases de planeamento e design até as fases de construção e pós-construção.</p>",
    p2: "<p class='text-justify'>Na busca de soluções especializadas para sua actividade, temos oferta perfeita para as tuas necessidades:</p>",
    ul: "<ul class=''><li>Construção de Obras;</li><li>Instalação de redes técnicas;</li><li>Isolamento térmico e acústico;</li><li> Direcção e gestão de obras de diversos projectos Arquitectônicos;</li><li> Fiscalização integral da obra;</li></ul>"
}
let pPromocaoGestaoProjectos = {}

const api = {
    AgropecuariaAvicultura: {
        title: 'Agropecuária e Avicultura',
        content: pAgropecuariaAvicultura.p1+pAgropecuariaAvicultura.p2+pAgropecuariaAvicultura.p3
    },
    Arquitetura: {
        title: 'Arquitetura',
        content: pArquitetura.p1+pArquitetura.p2
    },
    CienciasNaturais: {
        title: 'Ciências Naturais',
        content: pArquitetura.p1+pArquitetura.p2
    },
    ContrucaoCivil: {
        title: 'Contrução Civil',
        content: pContrucaoCivil.p1+pContrucaoCivil.p2+pContrucaoCivil.ul
    },
    DesenvolvimentoProfissional: {
        title: 'Desenvolvimento Profissional',
        content: pArquitetura.p1+pArquitetura.p2
    },
    PromocaoGestaoProjectos: {
        title: 'Promoção e Gestão de Projectos',
        content: ''
    }

}

document.querySelectorAll('.page-title').forEach(element => {
    element.innerHTML = api[value].title;
});



document.querySelector('#content').innerHTML = api[value].content;
