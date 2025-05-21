<!-- Timeline Section -->
<div class="timeline-section">
    <h2 class="section-title">Timeline of the Attack</h2>
    <div class="timeline-container">
        <div class="row position-relative">
            <?php
            // Add hard-coded timeline points if database retrieval fails
            if (empty($events)) {
                $hardcodedEvents = [
                    ['title' => 'Initial Release', 'icon_class' => 'fa-rocket'],
                    ['title' => 'Rapid Propagation', 'icon_class' => 'fa-network-wired'],
                    ['title' => 'Widespread Impact', 'icon_class' => 'fa-exclamation-triangle'],
                    ['title' => 'Containment Efforts', 'icon_class' => 'fa-shield-alt'],
                    ['title' => 'Legacy & Impact', 'icon_class' => 'fa-history']
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