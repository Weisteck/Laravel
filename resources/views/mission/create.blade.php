<h1>Creation d'une nouvelle mission :</h1>
<form method="POST" action="{{route('missions.store', $organisation)}}">
    @csrf
    <label>
        Reference
        <br>
        <input type="text" name="reference">
    </label>
    <br>
    <br>
    <label>
        Title
        <br>
        <input type="text" name="title">
    </label>
    <br>
    <br>
    <label>
        Comment
        <br>
        <input type="text" name="comment">
    </label>
    <br>
    <br>
    <label>
        Deposit
        <br>
        <input type="number" name="deposit">
    </label>
    <br>
    <br>
    <label>
        Fin de la mission
        <br>
        <input type="date" name="ended_at">
    </label>
    <br>
    <br>
    <div v-scope="{ mission_lines: [] }">
        <button @click.prevent="mission_lines.push({title: '', quantity: 0, price: 0, unity: ''})">
            Ajouter une ligne
        </button>

        <div v-for="(line, index) in mission_lines">
            <div class="my-3">
                <label>
                    <div>
                        <p>
                            Ligne @{{ index + 1 }}
                        </p>

                        <label>
                            Title
                            <br>
                            <input type="text" :name="`mission_lines[${index}][title]`">
                        </label>
                        <br>
                        <label>
                            Quantity
                            <br>
                            <input min="0" type="number" :name="`mission_lines[${index}][quantity]`">
                        </label>
                        <br>
                        <label>
                            Price
                            <br>
                            <input min="0" type="number" :name="`mission_lines[${index}][price]`">
                        </label>
                        <br>
                        <label>
                            Unity
                            <br>
                            <input type="text" :name="`mission_lines[${index}][unity]`">
                        </label>
                        <br>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <button type="submit">Enregistrer</button>
</form>
<script src="https://unpkg.com/petite-vue" defer init></script>
