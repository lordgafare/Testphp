import { test, expect } from '@playwright/test';

// test('has title', async ({ page }) => {
//   await page.goto('https://playwright.dev/');

//   // Expect a title "to contain" a substring.
//   await expect(page).toHaveTitle(/Playwright/);
// });

// test('get started link', async ({ page }) => {
//   await page.goto('https://playwright.dev/');

//   // Click the get started link.
//   await page.getByRole('link', { name: 'Get started' }).click();

//   // Expects page to have a heading with the name of Installation.
//   await expect(page.getByRole('heading', { name: 'Installation' })).toBeVisible();
// });
test('ตัวอย่างการทดสอบหน้าล็อกอิน', async ({ page }) => {
  // ไปยังหน้าล็อกอินของเว็บไซต์ของคุณ
  await page.goto('http://localhost:8080');

  // กรอกข้อมูลในฟอร์ม
  await page.fill('input[name="email"]', 'gun_gun2541@hotmail.com');
  await page.fill('input[name="password"]', '123456');

  // คลิกปุ่มล็อกอิน
  await page.click('input[type="submit"]');

  // ตรวจสอบว่าได้เข้าสู่ระบบหรือไม่
  await expect(page).toHaveURL('http://localhost:8080/index.php/');

});
test('สร้างข้อมูลใหม่', async ({ page }) => {
  // ไปยังหน้าสร้างข้อมูล
  await page.goto('http://localhost:8080/addname');
  // กรอกข้อมูลในฟอร์ม
  await page.fill('input[name="name"]', 'Kasidech26');
  await page.fill('input[name="email"]', 'assd@gmail.com');
  // กรอกข้อมูลอื่นๆ ตามต้องการ
  await page.click('input[type="submit"]'); // ส่งข้อมูล
  // ตรวจสอบว่าข้อมูลถูกสร้างขึ้น
  await expect(page).toHaveURL('http://localhost:8080/index.php/namelist');
  // await expect(page.locator('text=ข้อมูลถูกสร้าง')).toBeVisible();;
  // await expect(page).toHaveURL('http://localhost:8080/index.php/namelist');

});
test('ดูข้อมูล', async ({ page }) => {
  await page.goto('http://localhost:8080//namelist');
  // ตรวจสอบข้อมูลบางอย่าง
  await expect(page.locator('text=Kasidech26')).toBeVisible();;
});
test('อัปเดตข้อมูล', async ({ page }) => {
  await page.goto('http://localhost:8080/editname/4');
  // ปรับปรุงข้อมูลในฟอร์ม
  await page.fill('input[name="name"]', 'Kasidech13');
  await page.fill('input[name="email"]', 'asasdd@gmail.com');
  await page.click('input[type="submit"]'); // ส่งข้อมูล

  await expect(page).toHaveURL('http://localhost:8080/index.php/namelist');

  // ตรวจสอบว่าข้อมูลถูกอัปเดต
  // await expect(page.locator('text=ข้อมูลอัพเดท')).toBeVisible();;
});
test('ดูข้อมูลอัพเดท', async ({ page }) => {
  await page.goto('http://localhost:8080//namelist');

  // ตรวจสอบข้อมูลบางอย่าง
  await expect(page.getByRole('cell', { name: 'Kasidech13' })).toBeVisible();;
});
test('ลบข้อมูล', async ({ page }) => {
  await page.goto('http://localhost:8080//namelist');

  // คลิกปุ่มลบข้อมูล
  const deleteLinkSelector = `a[href*="/delete/5"].btn.btn-danger`;
  await page.click(deleteLinkSelector);

  // ตรวจสอบว่าข้อมูลถูกลบ
  // await expect(page.locator('text=ข้อมูลถูกลบ')).toBeVisible();;
});
