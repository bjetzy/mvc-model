<div class="startPagesContent">
  <form action="/user/doCreate" method="post">
    <div class="field padding-bottom--24">
      <label for="title">*Titel</label>
      <input  name="title" type="text" class="form-control" required>
    </div>
    <div class="field padding-bottom--24">
      <label for="content">*Blog Inhalt</label>
      <textarea name="content" type="text" class="form-control" required></textarea>
    </div>
    <div class="fieldWithoutBorder padding-bottom--24">
      <label for="image">*Bild</label>
      <input name="image" type="file" accept="image/*" class="form-control" required>
    </div>
    <div class="field">
      <input type="submit" name="send"></input>
    </div>
  </form>
</div>
