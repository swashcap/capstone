<?php
/**
 * Contact form partial
 *
 * @package capstone
 */
?>
<div class="well">
    <form class="clearfix">
        <div class="form-group">
            <label for="contact-1">Name</label>
            <input id="contact-1" class="form-control">
        </div>
        <div class="form-group">
            <label for="contact-2">Email</label>
            <input id="contact-2" class="form-control">
        </div>
        <div class="form-group">
            <label for="contact-3">Event type (optional)</label>
            <select id="contact-3" class="form-control">
                <option selected="" disabled="">Choose…</option>
                <option>Wedding</option>
                <option>Engagement</option>
                <option>Family</option>
                <option>Other!</option>
            </select>
        </div>
        <div class="form-group">
            <label for="contact-4">Message (optional)</label>
            <textarea id="contact-4" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-primary pull-right">
    </form>
</div>
