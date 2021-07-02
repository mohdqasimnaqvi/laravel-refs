class Elems extends Array {
    loop(cb) {
        this.forEach(cb)
    }
    click(cb) {
        this.loop(elem => {
            elem.onclick = cb;
        })
    }
    child(str) {
        this.loop(e => {
            return selectAll(str, e);
        })
    }
    attr(attr) {
        return this.map(e => e[attr]);
    }
}
class Elem extends HTMLElement {
    childElements() {
            const elems = new Elems(...this.children)
            return elems;
    }
}
const selectAll = (str, element = document) => {
    const arr = new Elems();
    const elements = Array.from(element.querySelectorAll(str));
    elements.forEach(elem => arr.push(elem));
    return arr;
};
const dropdowns = selectAll('.dropdown')
dropdowns.loop(dropdown => {
    const button = dropdown.querySelector('.dropdown-btn');
    const list = dropdown.querySelector('.dropdown-list');
    button.addEventListener('click', () => {
        list.classList.toggle('shown');
    })
})
const data_js = selectAll('[data-js]')
data_js.forEach(elem => {
    const v = elem.dataset.js;
    const js = eval(v);
    if(typeof js === 'function') {
        js(elem, data_js);
    }
})
