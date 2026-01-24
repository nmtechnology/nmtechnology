const fs = require('fs');
const s = fs.readFileSync('resources/js/views/ProductsPage.vue', 'utf8');
const tplStart = s.indexOf('<template>');
const tplEnd = s.indexOf('</template>');
const tpl = s.substring(tplStart + '<template>'.length, tplEnd);
const tagRegex = /<\/?([a-zA-Z0-9-]+)([^>]*)>/g; // capture full tag content for self-close detection
let match;
let stack = [];
while ((match = tagRegex.exec(tpl))) {
  const full = match[0];
  const name = match[1];
  const attrs = match[2] || '';
  const isClose = full.startsWith('</');
  // Detect self-closing by checking if the full tag ends with '/>' (match[0] includes the trailing '>')
  const selfClose = full.trim().endsWith('/>');
  const before = tpl.substring(0, match.index);
  const line = before.split('\n').length;
  if (process.env.DEBUG) {
    if (stack.length < 40) {
      console.log('TAG', name, 'isClose', isClose, 'selfClose', selfClose, 'line', line, 'stackTop', stack[stack.length-1]);
    }
  }
  if (isClose) {
    if (stack.length === 0 || stack[stack.length - 1].name !== name) {
      console.error('Mismatch or unexpected close for', name, 'at line', line, 'stack top', stack[stack.length-1]);
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
