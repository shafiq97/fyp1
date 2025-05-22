<!-- Timeline Section -->
<div class="timeline-section">
    <h2 class="section-title">Timeline of the Attack</h2>
    <div class="timeline-container">
        <div class="row position-relative">
            <?php
            // Add hard-coded timeline points if database retrieval fails
            if (empty($events)) {
                $hardcodedEvents = [
                    ['title' => 'First Appearance', 'icon_class' => 'fa-binoculars'],
                    ['title' => 'Widespread Distribution', 'icon_class' => 'fa-globe'],
                    ['title' => 'Banking Targets', 'icon_class' => 'fa-university'],
                    ['title' => 'Law Enforcement Response', 'icon_class' => 'fa-gavel'],
                    ['title' => 'Legacy & Variants', 'icon_class' => 'fa-code-branch']
                ];
                foreach ($hardcodedEvents as $index => $event):
            ?>
            <div class="col text-center">
                <div class="timeline-point d-inline-flex align-items-center justify-content-center">
                    <i class="fas <?php echo htmlspecialchars($event['icon_class']); ?>"></i>
                </div>
                <p class="mt-2"> <?php echo htmlspecialchars($event['title']); ?> </p>
            </div>
            <?php endforeach; } ?>
        </div>
    </div>
</div>