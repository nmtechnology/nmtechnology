const fs = require('fs');
const s = fs.readFileSync('resources/js/views/ProductsPage.vue', 'utf8');
const tplStart = s.indexOf('<template>');
const tplEnd = s.indexOf('</template>');
const tpl = s.substring(tplStart + '<template>'.length, tplEnd);
const tagRegex = /<\/?([a-zA-Z0-9-]+)(\s|>|\/)/g;
let match;
let stack = [];
while ((match = tagRegex.exec(tpl))) {
  const full = match[0];
  const name = match[1];
  const isClose = full.startsWith('</');
  const selfClose = full.endsWith('/>') || ['img', 'input', 'br', 'hr', 'path', 'svg'].includes(name);
  const before = tpl.substring(0, match.index);
  const line = before.split('\n').length;
  if (isClose) {
    if (stack.length === 0 || stack[stack.length - 1].name !== name) {
      console.error('Mismatch or unexpected close for', name, 'at line', line);
      process.exit(1);
    }
    stack.pop();
  } else if (!selfClose) {
    stack.push({ name, line });
  }
}
if (stack.length) {
  console.error('Unclosed tag', stack[stack.length - 1]);
  process.exit(1);
}
console.log('All tags matched');
