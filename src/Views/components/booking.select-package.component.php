<section class="booking-section-2 booking-select-package">
    <div class="package-selection-container">
        <select name="package-selection" id="package-selection" placeholder="Select a package" value="<?= $this->package ?>">
            <option value="standard-package">Standard</option>
            <option value="memory-maker-package">Memory maker</option>
            <option value="luxe-framez-package">Luxe framez</option>
            <option value="deluxe-memory-package">Deluxe Memory</option>
        </select>
    </div>
    <div class="selected-package-container">
        <?= $this->renderView($this->component($this->package), []) ?> 
    </div>
    <div class="booking-navigation">
        <button type="button" class="next-button" data-few:="nextForm" data-position="select-package">Next</button>
    </div>
</section>