<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pokemon or Medication?</div>
                    <p>Correct: <span v-text="score"></span></p>
                    <p>Incorrect: <span v-text="incorrect"></span></p>
                    <template v-if="whichSix(0)">
                        <button v-on:click="minusOne" v-text="pokemon1"></button>
                        <button v-on:click="minusOne" v-text="pokemon2"></button>
                        <button v-on:click="minusOne" v-text="pokemon3"></button>
                        <button v-on:click="minusOne" v-text="pokemon4"></button>
                        <button v-on:click="minusOne" v-text="pokemon5"></button>
                        <button v-on:click="plusOne" v-text="medicine"></button>
                    </template>
                    <template v-if="whichSix(1)">
                        <button v-on:click="minusOne" v-text="pokemon1"></button>
                        <button v-on:click="minusOne" v-text="pokemon2"></button>
                        <button v-on:click="minusOne" v-text="pokemon3"></button>
                        <button v-on:click="minusOne" v-text="pokemon4"></button>
                        <button v-on:click="plusOne" v-text="medicine"></button>
                        <button v-on:click="minusOne" v-text="pokemon5"></button>
                    </template>
                    <template v-if="whichSix(2)">
                        <button v-on:click="minusOne" v-text="pokemon1"></button>
                        <button v-on:click="minusOne" v-text="pokemon2"></button>
                        <button v-on:click="minusOne" v-text="pokemon3"></button>
                        <button v-on:click="plusOne" v-text="medicine"></button>
                        <button v-on:click="minusOne" v-text="pokemon4"></button>
                        <button v-on:click="minusOne" v-text="pokemon5"></button>
                    </template>
                    <template v-if="whichSix(3)">
                        <button v-on:click="minusOne" v-text="pokemon1"></button>
                        <button v-on:click="minusOne" v-text="pokemon2"></button>
                        <button v-on:click="plusOne" v-text="medicine"></button>
                        <button v-on:click="minusOne" v-text="pokemon3"></button>
                        <button v-on:click="minusOne" v-text="pokemon4"></button>
                        <button v-on:click="minusOne" v-text="pokemon5"></button>
                    </template>
                    <template v-if="whichSix(4)">
                        <button v-on:click="minusOne" v-text="pokemon1"></button>
                        <button v-on:click="plusOne" v-text="medicine"></button>
                        <button v-on:click="minusOne" v-text="pokemon2"></button>
                        <button v-on:click="minusOne" v-text="pokemon3"></button>
                        <button v-on:click="minusOne" v-text="pokemon4"></button>
                        <button v-on:click="minusOne" v-text="pokemon5"></button>
                    </template>
                    <template v-if="whichSix(5)">
                        <button v-on:click="plusOne" v-text="medicine"></button>
                        <button v-on:click="minusOne" v-text="pokemon1"></button>
                        <button v-on:click="minusOne" v-text="pokemon2"></button>
                        <button v-on:click="minusOne" v-text="pokemon3"></button>
                        <button v-on:click="minusOne" v-text="pokemon4"></button>
                        <button v-on:click="minusOne" v-text="pokemon5"></button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const pokemonAPI = require('pokemon');
    const drugs = ["Fosamax", "Zovirax", "Albuterol", "ProAir", "Aclovate", "U'roxatral", "Panretin", "Zyloprim", "Xanax", "Hexalen", "Cordarone", "Elavil", "Exforge", "Norvasc", "Exforge", "Lotrel", "Amoxapine", "Arimidex", "Hyzaar", "Aspirin", "Tenormin", "Tenoretic", "Lipitor", "Diprolene", "Imuran", "Astepro", "Astelin", "Lioresal", "Alkaloids", "Lotensin", "Lotensin", "Tessalon", "Benzonatate", "Benztropine", "Urecholine", "Casodex", "Ziac", "Brimonidine Tartrate", "Bromocriptine", "Pulmicort", "Wellbutrin", "Buspar", "Rocaltrol", "Atacand", "Capsaicin", "Capoten", "Tegretol", "Sinemet", "Coreg", "Zyrtec", "Evoxac", "Chlordiazepoxide", "Chlorpromazine", "Chlorthalidone", "Prevalite", "Pletal", "Celexa", "Cleocin", "Klonopin", "Catapres", "Plavix", "Lotrisone", "Colestid", "Dacogen", "Focalin", "Dextroamphetamine", "Adderall", "Valium", "Voltaren", "Bentyl", "Lanoxin", "Dilacor", "Cardizem", "Lomotil", "Lonox", "Depakote", "Aricept", "Trusopt", "Cosopt", "Cardura", "Doxepin", "Vasotec", "Vaseretic", "Eplerenone", "Lexapro", "Nexium", "Estrace", "Ogen", "Lunesta", "Lodine", "Pepcid", "Plendil", "Tricor", "Lofibra", "Trilipix", "Proscar", "Diflucan", "Fluoxetine", "Prozac", "Flonase", "Lasix", "Neurontin", "Lopid", "Amaryl", "Glucotrol", "Micronase", "Glucovance", "Intuniv", "Ultravate", "Haloperidol", "Hydralazine", "Microzide", "Hydrocortisone", "Plaquenil", "Hydrea", "Hydroxyzine", "Vistaril", "Motrin", "Imatinib", "Indapamide", "DuoNeb", "Avapro", "Avalide", "Isoniazid", "Imdur", "Ismo", "Monoket", "Alaway", "Trandate", "Enulose", "Lamictal", "Prevacid", "Xalatan", "Femara", "Xopenex", "Keppra", "Xyzal", "Levoxyl", "Synthroid", "Lidocaine", "Lidoderm", "Cytomel", "Prinivil", "Zestril", "Prinzide", "Zestoretic", "Loperamide", "Claritin", "Ativan", "Cozaar", "Mevacor", "Loxapine", "Antivert", "Provera", "Mobic", "Namenda", "Glucophage", "Tapazole", "Robaxin", "Methotrexate", "Metadate", "Ritalin", "Ritalin", "Reglan", "Zaroxolyn", "Dutoprol", "Lopressor", "Glynase", "Midodrine", "Minocin", "Dynacin", "Remeron", "Elocon", "Singulair", "CellCept", "Nabumetone", "Anaprox", "Naprosyn", "Niacin", "Niaspan", "Nifedipine", "Adalat", "Nilandron", "Ortho", "Ovcon", "Pamelor", "Nystatin", "Zyprexa", "Lovaza", "Prilosec", "Zofran", "Oxandrin", "Ditropan", "Protonix", "Paxil", "Trental", "Perphenazine", "Donnatal", "Dibenzyline", "Dilantin", "Actos", "Prenatal", "K-Dur", "Mirapex", "Pravachol", "Prazosin", "Prednisone", "Mysoline", "Prochlorperazine", "Progesterone", "Rythmol", "Inderal", "Propylthiouracil", "Mestinon", "Seroquel", "Accupril", "Accuretic", "Aciphex", "Evista", "Altace", "Zantac", "Prandin", "Actonel", "Risperdal", "Exelon", "Requip", "Crestor", "Zoloft", "Revatio", "Zocor", "Aldactone", "Aldactazide", "Ortho-Cyclen", "Carafate", "Bactrim", "Septra", "Azulfidine", "Imitrex", "Prograf", "Tamoxifen", "Flomax", "Micardis", "Restoril", "Hytrin", "Vogelxo", "Zanaflex", "Detrol", "Topamax", "Qudexy", "Ultracet", "Ultram", "Mavik", "Parnate", "Desyrel", "Ortho-Tri-Cyclen", "Triamcinolone", "Dyrenium", "Dyazide", "Maxzide", "Trifluoperazine", "Trospium", "Valtrex", "Depakene", "Diovan", "Effexor", "Calan", "Isoptin", "Jantoven", "Accolate", "Sonata", "Zidovudine", "Ambien"]
    export default {
        beforeMount(){
            this.progress()
        },
        mounted() {
            console.log('Component mounted.')
        },
        props:['score','pokemon1','pokemon2','pokemon3','pokemon4','pokemon5','medicine','whichFirst','incorrect'],
        methods: {
            plusOne(){
                this.score++
                this.pokemon1 = pokemonAPI.random();
                this.pokemon2 = pokemonAPI.random();
                this.pokemon3 = pokemonAPI.random();
                this.pokemon4 = pokemonAPI.random();
                this.pokemon5 = pokemonAPI.random();
                this.medicine = drugs[Math.floor(Math.random() * 271)];
                this.whichFirst = Math.floor(Math.random() * 6)
            },
            minusOne(){
                this.incorrect++
                this.pokemon1 = pokemonAPI.random();
                this.pokemon2 = pokemonAPI.random();
                this.pokemon3 = pokemonAPI.random();
                this.pokemon4 = pokemonAPI.random();
                this.pokemon5 = pokemonAPI.random();
                this.medicine = drugs[Math.floor(Math.random() * 271)];
                this.whichFirst = Math.floor(Math.random() * 6)
            },
            progress(){
                this.pokemon1 = pokemonAPI.random();
                this.pokemon2 = pokemonAPI.random();
                this.pokemon3 = pokemonAPI.random();
                this.pokemon4 = pokemonAPI.random();
                this.pokemon5 = pokemonAPI.random();
                this.medicine = drugs[Math.floor(Math.random() * 271)];
                this.whichFirst = Math.floor(Math.random() * 6)
            },
            whichSix(passedNumber){
                return passedNumber == this.whichFirst
            }
        }
    }
</script>
